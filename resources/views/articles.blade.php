@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dados dos carros capturados.</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nome Carro</th>
                                <th>Ano</th>
                                <th>Combustível</th>
                                <th>Cor</th>
                                <th>Portas</th>
                                <th>Câmbio</th>
                                <th>Km</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($articles) == 0)
                                <tr>
                                    <td colspan="10">
                                        <p class="alert alert-danger text-center">Nenhum artigo cadastrado!</p>
                                    </td>
                                </tr>
                            @endif
                            @foreach ($articles as $article)
                                <tr>
                                    <td><a target="_blank" href="{{ $article->link }}">{{ $article->name_car }}</a></td>
                                    <td>{{ $article->year }}</td>
                                    <td>{{ $article->fuel }}</td>
                                    <td>{{ $article->color }}</td>
                                    <td>{{ $article->doors }}</td>
                                    <td>{{ $article->exchange }}</td>
                                    <td>{{ $article->mileage }}</td>
                                    <td>{{ $article->price }}</td>

                                    <td style="width:145px">
                                        <a class="btn btn-danger btn-sm" href="/articles/{{ $article->id }}/delete"
                                           onclick="return confirm ('Você deseja apagar esse artigo?')"><span class="glyphicon glyphicon-trash"></span</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {!! $articles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
