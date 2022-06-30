@extends('layouts.main')

@section('title', 'HDC Carros')
    
@section('content')

    <div id="search-container" class="col-md-12">
        <form action="/" method="GET">
            <h1>Pesquisar Carros</h1>
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="cars-container" class="col-md-12">
        @if($search)
        <h2>Buscando por: {{$search}}</h2>
        @else
        <h2>Todos os Carros</h2>
        <p class="subtitle">Veja todos os carros da nossa garagem</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($cars as $car)
                <div class="card col-md-3">

                    <img src="/img/cars/{{$car->image}}" alt="{{$car->modelo}}">
                    <div class="card-body">
                        <p class="card-codigo"><b>Código:</b> {{$car->codigo}}</p>
                        <h5 class="card-modelo">{{$car->marca}} {{$car->modelo}}</h5>
                        <p class="card-compradores" style="color: black">{{count($car->users)}} vendidos</p>
                        <a href="/cars/{{$car->id}}" class="btn btn-primary">Sobre</a>
                    </div>

                </div>
            @endforeach
        </div>
        @if(count($cars) == 0 && $search)
            <p>Não foi possível enconrar nenhum carro com {{$search}}! <a href="/">Ver todos</a></p>
        @elseif(count($cars) == 0)
            <p>Não há carros disponíveis</p>
        @endif
    </div>
@endsection