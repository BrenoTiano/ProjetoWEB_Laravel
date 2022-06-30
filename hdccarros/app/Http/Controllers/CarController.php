<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\User;

class CarController extends Controller
{
    public function index(){

        $search = Request('search');

        if($search){

            $cars = Car::where([

                ['marca','like', '%'.$search.'%']

            ])->get();

        }else{
            $cars = Car::all();
        }

    return view('welcome',['cars' => $cars, 'search' => $search]);
    }

    public function create(){
        return view('car.create');
    }

    public function store(Request $request){

        $car = new Car;

        $car->codigo = $request->codigo;
        $car->marca = $request->marca;
        $car->modelo = $request->modelo;
        $car->ano = $request->ano;
        $car->valorVenal = $request->valorVenal;
        $car->itens = $request->itens;

        //Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . "." . $extension);

            $request->image->move(public_path('img/cars'), $imageName);

            $car->image = $imageName;

        }

        $user = auth()->user();
        $car->user_id = $user->id;

        $car->save();

        return redirect('/')->with('msg','Veículo cadastrado com sucesso!');
    }

    public function show($id){

        $car = Car::findOrfail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userCars = $user->carsAsQuant->toArray();

            foreach($userCars as $userCar){
                if($userCar['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $carOwner = User::where('id', $car->user_id)->first()->toArray();

        return view('car.show', ['car' => $car, 'carOwner' => $carOwner, 'hasUserJoined' => $hasUserJoined]);

    }

    public function dashboard(){

        $user = auth()->user();

        $cars = $user->cars;

        $carsAsQuant = $user->carsAsQuant;

        return view('car.dashboard', 
        ['cars' => $cars,'carsAsQuant' => $carsAsQuant]);

    }

    public function destroy($id){

        Car::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Carro excluído com sucesso!');

    }


    public function edit($id){

        $user = auth()->user();

        $car = Car::findOrFail($id);

        if($user->id != $car->user->id){
            return redirect('/dashboard');
        }

        return view('car.edit', ['car' => $car]);

    }


    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . "." . $extension);

            $request->image->move(public_path('img/cars'), $imageName);

            $data['image'] = $imageName;

        }

        Car::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Carro editado com sucesso!');

    }

    public function joinCar($id){

        $user = auth()->user();

        $user->carsAsQuant()->attach($id);

        $car = Car::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua compra está confirmada do Carro: '. $car->modelo);


    }

    public function leaveCar($id){

        $user = auth()->user();

        $user->carsAsQuant()->detach($id);

        $car = Car::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você desistiu da compra com sucesso do carro:: ' . $car->marca);

    }

}
