<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class users extends Controller
{
    function index( $id=102 ){        
        return view('users.home',['id'=>$id]);
    }

    function pgcreate(Request $request){
        return view('page');
    
    }

    function page2(){
        return view('page2');
    }

}

