<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       

       //$img = Auth::user()->profile->image ;

       if (empty(Auth::user()->profile->image)) {
           $pix = '';
       } else {
        $pix = Auth::user()->profile->image;
       }


       $toShow = $request->session()->get('status');


       //var_dump($img);

        return view('home', compact('pix', 'toShow'));
    }
}
