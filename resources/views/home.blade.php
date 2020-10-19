@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <label for="texto">Modo de uso:</label>
                    <p>Informe a marca do carro e clique em capturar, para que o</p>
                    <p>sistema possa encontrar todos os carros dessa marca.</p>
                    <div class="panel-heading">Capturar Dados dos Carros.</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="#" id="form-get-items">
                            {{ csrf_field() }}
                            <div class="form-group ">
                                <label for="texto">Informe a marca do carro:</label>
                                <div class="input-group col-md-6">
                                    <input type="hidden" id="url" name="url" style="width:100%;" value="https://www.questmultimarcas.com.br/estoque?termo=">
                                    <input type="text" id="term" name="term" class="form-control" value="fiat">
                                </div>
                            </div>
                            <button type="submit" style="width:50%;" class="btn btn-success btn-block">Capturar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
