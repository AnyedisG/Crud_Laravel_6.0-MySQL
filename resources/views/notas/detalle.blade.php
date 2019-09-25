@extends('layout')

@section('seccion')
	<h1>Detalle de nota</h1>
	<h4>id: {{ $nota->id }}</h4>
	<h4>Nombre: {{ $nota->nombre }}</h4>
	<h4>Descripción: {{ $nota->description }}</h4>
	<h4>Creado hace: {{ $nota->created_at->diffForHumans() }}</h4>
@endsection