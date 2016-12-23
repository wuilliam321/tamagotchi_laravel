@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de mascotas
                    <a href="/crear" class="btn btn-xs btn-primary pull-right">Nueva Mascota</a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Energia</th>
                                <th>Diversion</th>
                                <th>Hambre</th>
                                <th>Higiene</th>
                                <th>Social</th>
                                <th>Salud</th>
                                <th>Play</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mascotas as $mascota)
                                <tr>
                                    <td>{{$mascota->nombre}}</td>
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
                                    <td>
                                        <a href="/jugar/{{$mascota->id}}" class="btn btn-primary">Play</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
