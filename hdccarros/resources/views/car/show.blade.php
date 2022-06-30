@extends('layouts.main')

@section('title', $car->modelo)

@section('content')


<div class="col-md-10 offset-md-3">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/cars/{{$car->image}}" class="img-fluid" alt="{{$car->modelo}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$car->modelo}}</h1>
            <p class="car-marca"><ion-icon name="bookmarks-outline"></ion-icon>{{$car->marca}}</p>
            <p class="cars-quantVend"><ion-icon name="cash-outline"></ion-icon>{{count($car->users)}} vendidos</p>
            <p class="car-owner"><ion-icon name="megaphone-outline"></ion-icon>{{$carOwner['name']}}</p>
            <p class="car-valor"><ion-icon name="cash-outline"></ion-icon>R${{$car->valorVenal}},00</p>

            @if(!$hasUserJoined)
            <form action="/cars/join/{{$car->id}}" method="GET">
                @csrf
            <a href="/cars/join/{{$car->id}}" 
                class="btn btn-primary" 
                id="car-submit"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                Confimar compra
            </a>
            @else
            <p class="already-joined-msg"> Você já comprou este carro!</p>
            @endif
            </form>
            <h3>O carro conta com:</h3>
            <ul id="cars-list">
                @foreach ($car->itens as $item)
                    <li><ion-icon name="play-outline"></ion-icon><span>{{$item}}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o carro: </h3>
            <p class="car-description">{{$car->modelo}}</p>
        </div>
    </div>

</div>
@endsection