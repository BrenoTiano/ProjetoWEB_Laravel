@extends('layouts.main')

@section('title', 'Editando: '. $car->title)

@section('content')

<div id="car-create-container" class="col-md-6 offset-md-3">

    <h2>Editando: {{$car->modelo}}</h2>

    <form action="/cars/update/{{$car->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do Carro: </label>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="/img/cars/{{$car->image}}" alt="{{$car->marca}}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="codigo">Código: </label>
            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código do carro" value="{{$car->codigo}}">
        </div>
        <div class="form-group">
            <label for="marca">Marca: </label>
            <input type="text" id="marca" name="marca" class="form-control" value="{{ $car->marca}}">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo: </label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo do carro" value="{{$car->modelo}}">
        </div>
        <div class="form-group">
            <label for="ano">Ano: </label>
            <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano do carro" value="{{$car->ano}}">
        </div>
        <div class="form-group">
            <label for="valorVenal">Valor venal: </label>
            <input name="valorVenal" id="valorVenal" class="form-control" placeholder="Valor do veículo" value="{{$car->valorVenal}}">
        </div>
        <div class="form-group">
            <label for="itens">Diferencial: </label>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Maior Potência"> Maior Potência
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Melhor desempenho e agilidade"> Melhor desempenho e agilidade
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Custo Benefício"> Custo Benefício
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Está entre o Top 5 desta categoria"> Está entre o Top 5 desta categoria
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Editar carro">
    </form>

</div>

@endsection