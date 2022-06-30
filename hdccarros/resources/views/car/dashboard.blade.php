@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">

    <h1>Meus Carros</h1>

</div>
<div class="col-md-10 offset-md-1 dashboard-cars-container">

    @if(count($cars) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Carros</th>
                <th scope="col">Vendidos</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td scropt="row">{{$loop->index + 1}}</td>
                    <td><a href="/cars/{{$car->id}}">{{$car->marca}} {{$car->modelo}}</a></td>
                    <td>{{count($car->users)}}</td>
                    <td>
                        <a href="cars/edit/{{$car->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                        <form action="/cars/{{$car->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não possui carros, <a href="/cars/create">Cadastrar carros</a></p>
    @endif

</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">

    <h1>Carros que estou comprando </h1>

</div>
<div class="col-md-10 offset-md-1 dashboard-modelo-container">

    @if(count($carsAsQuant) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Carro</th>
                <th scope="col">Vendidos</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carsAsQuant as $car)
                <tr>
                    <td scropt="row">{{$loop->index + 1}}</td>
                    <td><a href="/cars/{{$car->id}}">{{$car->title}}</a></td>
                    <td>{{count($car->users)}}</td>
                    <td>
                        <form action="/cars/leave/{{$car->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                            Desistir do Carro
                        </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não está comprando nenhum carro <a href="/">Veja todos os carros</a></p>
    @endif 

</div>


@endsection