@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Jugando con {{$mascota->nombre}}
                    <a href="/" class="btn btn-xs btn-primary pull-right">&lt; Volver</a>
                </div>

                <div class="panel-body">

                    @if($error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endif

                    <h2>{{ $mascota->nombre }}</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-xs-2">Energia</th>
                                <th class="col-xs-2">Diversion</th>
                                <th class="col-xs-2">Hambre</th>
                                <th class="col-xs-2">Higiene</th>
                                <th class="col-xs-2">Social</th>
                                <th class="col-xs-2">Salud</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td><a href="/jugar/{{ $mascota->id }}/dormir">Ir a dormir</a></td>
                                <td><a href="/jugar/{{ $mascota->id }}/television">Ver television</a></td>
                                <td><a href="/jugar/{{ $mascota->id }}/comer">Comer algo</a></td>
                                <td><a href="/jugar/{{ $mascota->id }}/ducharse">Tomar una ducha</a></td>
                                <td><a href="/jugar/{{ $mascota->id }}/hablar">Hablara con alguien</a></td>
                                <td><a href="/jugar/{{ $mascota->id }}/correr">Salir a correr</</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$mascota->energia}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$mascota->energia}}%;">
                                            {{$mascota->energia}}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$mascota->diversion}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$mascota->diversion}}%">
                                            {{$mascota->diversion}}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$mascota->hambre}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$mascota->hambre}}%;">
                                            {{$mascota->hambre}}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$mascota->higiene}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$mascota->higiene}}%;">
                                            {{$mascota->higiene}}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$mascota->social}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$mascota->social}}%;">
                                            {{$mascota->social}}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$mascota->salud}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$mascota->salud}}%;">
                                            {{$mascota->salud}}%
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
