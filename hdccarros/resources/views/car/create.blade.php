@extends('layouts.main')

@section('title', 'Cadastrar Carro')

@section('content')

<div id="carro-create-container" class="col-md-6 offset-md-3">

    <h2>Cadastre seu Carro</h2>

    <form action="/cars" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Carro: </label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="codigo">Código: </label>
            <input type="text" id="codigo" name="codigo" class="form-control">
        </div>
        <div class="form-group">
            <label for="marca">Marca: </label>
            <input type="text" id="marca" name="marca" class="form-control">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo: </label>
            <input type="text" id="modelo" name="modelo" class="form-control">
        </div>
        <div class="form-group">
            <label for="ano">Ano: </label>
            <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano do Veículo">
        </div>
        <div class="form-group">
            <label for="valorVenal">Valor Venal: </label>
            <input type="text" class="form-control" id="valorVenal" name="valorVenal" placeholder="R$">
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
        <input type="submit" class="btn btn-primary" value="Cadastrar Carro">
    </form>

</div>

@endsection