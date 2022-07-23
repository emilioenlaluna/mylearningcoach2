@extends('layouts.app')
@section('titulo', $viewData["titulo"])
@section('subtitulo', $viewData["subtitulo"])
@section('contenido')

    <div class="container my-4">
        @foreach ($viewData["curso"] as $curso)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('/img/Cursos/espanol.jpg')}}" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $curso->NombreCurso}} (${{ $curso->FechaInicio }})
                            </h5>
                            <p class="card-text">{{ $curso->FechaFin }}</p>
                            <p class="card-text">
                            {{--                    <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->idCurso]) }}">--}}
                            <form>
                                <div class="row">
                                    @csrf
                                    <div class="col-auto">
                                        <div class="input-group col-auto">
                                            <div class="input-group-text">Descripción</div>
                                        </div>
                                    </div>
                                    @guest
                                        <div class="col-auto">
                                            <a class="btn bg-primary text-white" href="{{ route('login') }}">Inicie
                                                Sesión para
                                                Inscribirse
                                            </a>
                                        </div>
                                    @else
                                        @padres
                                        <div class="col-auto">
                                            <button class="btn bg-primary text-white" type="submit">Inscribir Hijo a
                                                Curso
                                            </button>
                                        </div>
                                        @endpadres

                                        @maestro
                                        <div class="col-auto">
                                            <button class="btn bg-primary text-white" type="submit">Ir A Mis Cursos
                                            </button>
                                        </div>
                                        @endmaestro

                                        @tutor
                                        <div class="col-auto">
                                            <button class="btn bg-primary text-white" type="submit">Solicitar Hacer
                                                Tutorias en Curso
                                            </button>
                                        </div>
                                        @endtutor

                                        @alumno
                                        <div class="col-auto">
                                            <button class="btn bg-primary text-white" type="submit">Ir A Mis Cursos
                                            </button>
                                        </div>
                                        @endalumno
                                    @endguest

                                </div>
                            </form>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
