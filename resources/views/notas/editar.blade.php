@extends('layout')
@section('seccion')
	<h1>Editar nota {{ $nota->id }}</h1>
	@if(session('mensaje'))
		<div class="alert alert-success">
			{{ session('mensaje')}}
		</div>
	@endif
	<div class="pb-4">
        <form action="{{ route('notas.actualizar', $nota->id) }}" method="POST">
        	{{-- $nota->id = enviar el id especifico para decir que el
        	formulario que se va a actualizar va a ser con ese id --}}
        	@method('PUT'){{-- método pa enviar el formulario.--}}
            @csrf
            @error('nombre')
                <div class="alert alert-danger">
                    El nombre es requerido.
                </div>
            @enderror
            @error('description')
                <div class="alert alert-danger">
                    La descripción es requerida.
                </div>
            @enderror
            <input name="nombre"
                type="text"
                placeholder="Nombre"
                class="form-control mb-2"
                value="{{ $nota->nombre }}"
                	{{-- Al estar pasando toda la nota (App\Nota) de la DB
                	con la variable $nota que definimos en el controlador
                	podemos imprimirla en al campo value. --}}
            >
            <input name="description"
                type="text"
                placeholder="Descripción"
                class="form-control mb-2"
                value="{{ $nota->description }}"
            >
            <button class="btn btn-success btn-block" type="submit">
            	Guardar
            </button>
        </form>
    </div>
@endsection