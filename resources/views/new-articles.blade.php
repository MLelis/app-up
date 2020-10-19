@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard - {{$title}}</div>

                    <div class="panel-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(isset($errors) && count($errors))
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif


                             @if( isset($article) )
                                <form action="/articles/{{$article->id}}" method="POST">
                                    {!! method_field('PUT') !!}
                             @else
                                <form action="/articles" method="POST">
                             @endif

                            {{ csrf_field() }}
                            <input type="hidden" value="{{auth()->User()->id}}" name="user_id">
                            <div class="form-group">
                                <label for="name_car">Veículo</label>
                                <input type="text" class="form-control" id="name_car" name="name_car"
                                       placeholder="Nome do veículo" value="{{$article->name_car or old('name_car')}}">
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder="Link"
                                       value="{{$article->link or old('link')}}">
                            </div>
                            <div class="form-group">
                                <label for="price">Preco</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Preço"
                                       value="{{$article->price or old('price')}}">
                            </div>
                            <row class="text-center">
                                <div class="col-md-12">
                                    <small>Features</small>
                                </div>
                            </row>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="year">Ano</label>
                                    <input type="number" class="form-control" id="year" name="year"
                                           placeholder="Ano do veículo" value="{{$article->year or old('year')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mileage">Quilometragem</label>
                                    <input type="number" class="form-control" id="mileage" name="mileage"
                                           placeholder="Quilometragem do veículo"
                                           value="{{$article->mileage or old('mileage')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="color">Cor</label>
                                    <input type="text" class="form-control" id="color" name="color"
                                           placeholder="Cor do veículo" value="{{$article->color or old('color')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="doors">Portas</label>
                                    <input type="number" class="form-control" id="doors" name="doors"
                                           placeholder="Quant. de portas" value="{{$article->doors or old('doors')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exchange">Câmbio</label>
                                    <input type="text" class="form-control" id="exchange" name="exchange"
                                           placeholder="Câmbio do veículo"
                                           value="{{$article->exchange or old('exchange')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fuel">Combustível</label>
                                    <input type="text" class="form-control" id="fuel" name="fuel"
                                           placeholder="Tipo de combustível" value="{{$article->fuel or old('fuel')}}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
