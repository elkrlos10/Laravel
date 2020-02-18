@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> --}}

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col">Versión</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($formularios as $form)
                    <tr>
                        <th scope="row">{{$form->id}}</th>
                        <td>{{$form->nombre}}</td>
                        <td>{{$form->codigo}}</td>
                        <td>{{$form->version}}</td>
                        <td>    
                        <form action="{{ route('formulario.destroy', $form->id)}}" method="POST">
                        {{-- <form action="{{ route('producto.destroy',$producto->id) }}" method="POST"> --}}
                            <a href="{{route('formulario.edit',$form->id)}}"><button  type="button" class="btn btn-outline-primary">editar</button></a>

                            @csrf
                            @method('DELETE')
                            <a href=""><button type="submit" class="btn btn-outline-danger">eliminar</button></a>
                        </form>
                    </td>
                    </tr>
                   @endforeach 
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
