@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!--<div class="col-md-8 col-md-offset-2">-->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard - Get Car Quest Multimarcas</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- You are logged in!--}}
                        <form action="#" id="form-get-items">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="url">Url do Site</label>
                                <div class="input-group">
                                    <span class="input-group-addon">https://www.questmultimarcas.com.br/estoque?termo=</span>
                                    <input type="text" id="term" name="term" class="form-control" value="audi">
                                    <input type="hidden" id="url" name="url" value="https://www.questmultimarcas.com.br/estoque?termo=">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
