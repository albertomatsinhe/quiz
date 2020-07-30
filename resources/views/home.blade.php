@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Seja Bem Vindo! QuizSys.</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <h1>{{ $questions }}</h1>
                           Total de  Questões
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $users }}</h1>
                           Total de  Usuários
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $quizzes }}</h1>
                            Quizes respondidos
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ number_format($average, 2) }} / 10</h1>
                            Percentagem de Pontuação
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('testss.index') }}" class="btn btn-success">Responder ao Quiz!</a>
        </div>
    </div>
@endsection
