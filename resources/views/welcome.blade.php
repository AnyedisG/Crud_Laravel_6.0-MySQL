@extends('layout')

@section('seccion')
    <body>
        <h1 class="display-4 p-2">Notas</h1>

        {{-- Mensaje se session --}}
        @if(session('mensaje')){{-- preguntar por la sesion definida en el controlador --}}
            <div class="alert alert-success">
                {{ session('mensaje') }}{{-- mostrar lo que viene desde el controlador --}}
            </div>
        @endif

        {{-- Formulario para crear --}}
        <div class="pb-4">
            <form action="{{ route('notas.crear') }}" method="POST">
                @csrf

                {{-- validaciones de formulario crear --}}
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

                <input name="nombre"{{-- todos los imput deben llevar el mismo nombre que en la DB por convención y no estar confundido --}}
                    type="text"
                    placeholder="Nombre"
                    class="form-control mb-2"
                    value="{{ old('nombre') }}"{{-- Recordar lo que escribio el usuario cuando ocurra un error en el formulario --}}
                >
                <input name="description"
                    type="text"
                    placeholder="Descripción"
                    class="form-control mb-2"
                    value="{{ old('description') }}"
                >
                <div class="text-center mt-4 mb-5">
                    <button class="btn btn-primary btn-success" type="submit">
                        Agregar
                    </button>
                </div>
            </form>
        </div>
        {{-- Tabla --}}
        <div>
            <table class="table {{-- table-dark --}}">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Ver mas</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $item)
                        {{-- @foreach = Recorrido de la variable que se envío a esta vista.
                        item = nombre de como se va a comportar la variable. --}}
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                                {{-- {{}} - para hacer el eco.
                                    item = nombre de la variable de recorrido.
                                    -> - utilizando (id).
                                    id = el nombre del campo en la DB. --}}
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="{{ route('notas.detalle', $item) }}">
                                    Detalles
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                    href="{{ route('notas.editar', $item) }}">
                                        Editar
                                </a>
                                <form class="d-inline"
                                    action="{{ route('notas.eliminar', $item) }}"
                                    method="POST">
                                        @method('DELETE') {{--Método para eliminar.--}}
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            Eliminar
                                        </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach {{-- Cerrando el ciclo @foreach --}}
                </tbody>
            </table>
        </div>
    </body>
    {{ $notas->links() }} {{--Paginación. --}}
@endsection
