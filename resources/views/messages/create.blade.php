@extends('layout')

@section('contenido')

<h1>Contactos de</h1>

@if(session()->has('info'))

  <p>{{ session('info') }}</p>

@else

<form class="" action="{{ route('mensajes.store' )}}" method="post">
  <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
  {!! csrf_field() !!}
  <label for="nombre">
    Nombre:
    <input type="text" name="nombre" value="{{old('nombre')}}">
    {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
  </label>
  <label for="email">
    Email:
    <input type="email" name="email" value="{{old('email')}}">
    {!! $errors->first('email', '<span class="error">:message</span>') !!}
  </label>
  <label for="mensaje">
    Mensaje:
    <textarea name="mensaje">{{old('mensaje')}}</textarea>
    {!! $errors->first('message', '<span class="error">:message</span>') !!}
  </label>
  <input type="submit" value="Enviar">
</form>
@endif
@stop
