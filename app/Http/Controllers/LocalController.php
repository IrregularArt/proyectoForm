<?php

namespace App\Http\Controllers;

use App\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Validation\Rule;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /*      buscar si tiene ya un local creado                 */

    public function buscarSiExisteLocal(){
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar
        Validator::make($request->all(), [
            'telefono' =>'required',
            'whatsapp' => 'required',
            'nombreLocal' => ['required',
                            Rule::unique('locals', 'local_name')->ignore(session('document'), 'document_user') ],
            'direccion' => ['required',
                            Rule::unique('locals', 'address')->ignore(session('document'), 'document_user') ]
        ])->validate();

        //guardar imagen
        $image = Image::make($request->get('imagenLocal'));
        $nombre = session('document').'.png';
        $image->save(public_path().'/localesImg/'.$nombre);
    // guardar datos
        $local = new Local();
        $local->document_user = session('document');
        $local->phone = $request->telefono;
        $local->whatsapp = $request->whatsapp;
        $local->address	= $request->direccion;
        $local->other = $request->otros;
        $local->local_name = $request->nombreLocal;
        $local->local_img = $nombre;
        $local->save();
        return url('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function show(Local $local)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function edit(Local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Local $local)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function destroy(Local $local)
    {
        //
    }
}
