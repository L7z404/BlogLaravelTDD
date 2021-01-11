<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        
        // $temasTodos = DB::select('select * from themes');
        
        // $temasTodos = DB::table('themes')->get();
        
        // $temasTodos = new Theme();
        // $temasTodos = $temasTodos->all();
        
        $temasTodos=Theme::all();
        
        return view('welcome')->with(compact('temasTodos'));
    }
}
