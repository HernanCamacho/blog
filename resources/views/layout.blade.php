<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title>Website</title>
  </head>
  <body>
    <header>
      <?php
        function activeMenu($url){
          return request()->is($url) ? 'active' : '';
        }
      ?>
      <nav>
        <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Home</a>
        <a class="{{ activeMenu('saludos*') }}" href="{{ route('saludos', 'Hernan') }}">Saludos</a>
        <a class="{{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contacto</a>
        @if(auth()->guest())
            <a class="{{ activeMenu('login') }}" href="/login">login</a>
        @endif
        @if(auth()->check())
            <a class="{{ activeMenu('mensajes') }}" href="{{ route('mensajes.index') }}">Mensajes</a>
            <a class="{{ activeMenu('usuarios') }}" href="{{ route('usuarios.index') }}">Mensajes</a>
            <a href="/logout">Cerrar sesión de {{ auth()->user()->name}}</a>
        @endif
        <!-- @if(!(auth()->guest()))
            <a href="/logout">Cerrar sesión de {{ auth()->user()->name}}</a>
        @endif -->
      </nav>

    </header>
    @yield('contenido')
    <footer>Copyrigth &copy; {{date('Y')}}</footer>
  </body>
</html>
