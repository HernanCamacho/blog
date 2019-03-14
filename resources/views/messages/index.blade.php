@extends('layout')


@section('contenido')

  <h1>Todos los mensajes</h1>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Mensaje</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($messages as $message)
      <tr>
        <td>
          <a href="{{ route('mensajes.show', $message->id) }}">
            {{ $message->nombre }}
          </a>
        </td>
        <td>{{ $message->email }}</td>
        <td>{{ $message->mensaje }}</td>
        <td>
          <a href="{{ route('mensajes.edit', $message->id) }}">
            Editar
          </a>
          <form style="display:inline" action="{{ route('mensajes.destroy', $message->id) }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@stop
