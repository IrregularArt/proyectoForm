<?php

namespace App\Http\Controllers;

use App\Local;
use App\Product;
use App\User;
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
    public function index($id)
    {   
        $local = Local::where('id', '=', $id)->get();
        $productos = Product::where("id_local", "=", $id )->get();
        $datos = User::where('document', '=', $local[0]->document_user)->get();
        return view("Local",compact('productos','local', 'datos'));
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
    if (str_contains($request->whatsapp, '(+57)') == false) {
        $whatsapp = "(+57) ".$request->whatsapp;
    }else{
        $whatsapp = $request->whatsapp;
    }
        
        $local = new Local();
        $local->document_user = session('document');
        $local->phone = $request->telefono;
        $local->whatsapp = $whatsapp;
        $local->address	= $request->direccion;
        $local->other = $request->otros;
        $local->local_name = $request->nombreLocal;
        $local->local_img = $nombre;
        $local->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $info = Local::where('id','=', $request->id)
                ->join('users','locals.document_user', '=', 'users.document')
                ->get();
        return $info;
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
        if (str_contains($request->datos['whatsapp'], '(+57)') == false) {
            $whatsapp = "(+57) ".$request->datos['whatsapp'];
        }else{
            $whatsapp = $request->datos['whatsapp'];
        }
        Local::where('id', '=', $request->datos['id'])
            ->update(['phone' => $request->datos['phone'], 'local_name' => $request->datos['local_name'],
            'whatsapp' => $whatsapp, 'address' => $request->datos['address'], 
            'other' => $request->datos['other']]);
        return "completado";
    }

    Public function updateImg(Request $request){
        $image = Image::make($request->get('imgUrl'));
        $nombre = session('document').'.png';
        $image->save(public_path().'/localesImg/'.$nombre);
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
