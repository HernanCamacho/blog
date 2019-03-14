<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    public function home(){
      return view('home');
    }

    public function saludos($nombre = "Hernan1"){
        $consolas = [
          'PS4',
          'XBOX S',
          'XBOX X',
          'SWITCH'
        ];
        // return view('home', ['nombre' => $nombre]);
        // return view('home')->with(['nombre' => $nombre]);
        return view('saludos', compact('nombre', 'consolas'));

    }
}
