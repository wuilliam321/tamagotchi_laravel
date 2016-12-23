@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crear Mascota
                    <a href="/" class="btn btn-xs btn-primary pull-right">&lt; Volver</a>
                </div>

                <div class="panel-body">
                    @if($error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endif
                    <form class="form" action="/store" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de mi mascota">
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
