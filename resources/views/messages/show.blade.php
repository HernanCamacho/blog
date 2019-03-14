@extends('layout')

@section('contenido')

  <h1>Mensajes</h1>
  <p>Enviado por {{ $message->nombre }} email: {{ $message->email }}</p>
  <p>Mensaje: {{ $message->mensaje }}</p>

@stop
