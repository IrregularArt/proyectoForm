<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LocalController;
use App\Local;
use Illuminate\Support\Facades\Auth;

use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            $local = Local::where('document_user','=',session('document'))->get();
            
           if(count($local) != 0  ){
                return view('home',compact('local'));
            }else{
                return view('editarLocal');
            }
            
            
        }else{
            return view('welcome');
        }
    }
}
