@extends('layout')


@section('contenido')
  <h1>Editar mensaje de {{ $message->nombre }}</h1>
  <form class="" action="{{ route('mensajes.update', $message->id )}}" method="post">
    {!! method_field('PUT') !!}
    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
    {!! csrf_field() !!}
    <label for="nombre">
      Nombre:
      <input type="text" name="nombre" value="{{ $message->nombre }}">
      {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
    </label>
    <label for="email">
      Email:
      <input type="email" name="email" value="{{ $message->email}}">
      {!! $errors->first('email', '<span class="error">:message</span>') !!}
    </label>
    <label for="mensaje">
      Mensaje:
      <textarea name="mensaje">{{ $message->mensaje}}</textarea>
      {!! $errors->first('message', '<span class="error">:message</span>') !!}
    </label>
    <input type="submit" value="Enviar">
  </form>
@stop
