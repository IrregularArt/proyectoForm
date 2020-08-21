<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
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
        $this->validate($request, [
            'product_image' => 'required',
            'product_name' => 'required',
            'id_local' => 'required',
            'tags' => 'required',
        ]);

        $image = Image::make($request->product_image);
        $tags= explode(",", $request->tags); //crear un array cuando sea con una coma y solo en el campo tags
        $producto = Product::create(["product_name" => $request->product_name, 
                                    "product_description" => $request->product_description,
                                    "id_local" => $request->id_local,
                                    "tags" => $request->tags]); //
        $producto->tag($tags); //poner tags al producto

        $nombre = $producto->id.'.png'; //crear nombre de la imagen
        Product::where('id', $producto->id)->update(['product_image' => $nombre]); //actualizar y guardar el nombre de la imagen
        $image->save(public_path().'/productosImg/'.$nombre); //guardar imagen en el path
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($idLocal)
    {
        $productos = Product::where('id_local', $idLocal)->select('id', 
                                                            'id_local',
                                                            'product_name',
                                                            'product_description',
                                                            'product_image',
                                                            'tags')->get();
                                                            
        return $productos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'product_image' => 'required',
            'product_name' => 'required',
            'id_local' => 'required',
            'tags' => 'required',
        ]);

        $image = Image::make($request->product_image);
        $tags= explode(",", $request->tags); //crear un array cuando sea con una coma y solo en el campo tags
        $producto = Product::where('id', '=', $request->product_id)
                            ->update(["product_name" => $request->product_name, 
                                    "product_description" => $request->product_description,
                                    "tags" => $request->tags]); //
        $producto = Product::find($request->product_id);
        $producto->untag();
        $producto->tag($tags); //poner tags al producto

        $nombre = $request->product_id.'.png'; //crear nombre de la imagen
        $image->save(public_path().'/productosImg/'.$nombre); //guardar imagen en el path
        return "actualizado";
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producto = Product::find($request->idProducto);
        $file =public_path('productosImg/'.$request->idProducto.'.png');
        File::delete($file);
        $producto->untag();
        Product::where('id', '=', $request->idProducto)->delete();
        return "completado";
    }
}
