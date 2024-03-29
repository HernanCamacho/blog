<?php

namespace App\Http\Controllers;

use DB;
use App\Message;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    public function index()
    {
        // $messages = DB::table('messages')->get();
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Guardar mensaje
      // DB::table('messages')->insert([
      //     "nombre" => $request->input("nombre"),
      //     "email" => $request->input("email"),
      //     // "phone" => $request->input("phone"),
      //     "mensaje" => $request->input("message"),
      //     "created_at" => Carbon::now(),
      //     "updated_at" => Carbon::now()
      // ]);

      Message::create($request->all());

      // Redireccionar
      return redirect()->route('mensajes.create')->with('info', 'Hemos recibido tu mensaje, Crack.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id); //Nos envia un 404 y a la plantilla
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id); //Nos envia un 404 y a la plantilla
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Actualizar
        // DB::table('messages')->where('id', $id)->update([
        //   "nombre" => $request->input("nombre"),
        //   "email" => $request->input("email"),
        //   // "phone" => $request->input("phone"),
        //   "mensaje" => $request->input("mensaje"),
        //   "updated_at" => Carbon::now()
        // ]);

        $message = Message::find($id);
        $message->update($request->all());

        // Redireccionar
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('messages')->where('id',$id)->delete();
        $message = Message::find($id)->delete();
        return redirect()->route('mensajes.index');
    }
}
