@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form action="{{route('formulario.update',$formulario->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control form-control-sm" value="{{$formulario->nombre}}" name="nombre" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Código</label>
                  <input type="text" class="form-control form-control-sm" name="codigo" value="{{$formulario->codigo}}" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Versión</label>
                    <input type="text" class="form-control form-control-sm" name="version" value="{{$formulario->version}}" id="exampleInputPassword1">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

        </div>
    </div>
</div>
@endsection
