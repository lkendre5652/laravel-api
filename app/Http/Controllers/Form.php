<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Form extends Controller
{
    function index(Request $request){
        return view('forms.form');
    }
    function submitAct(Request $request){
        return 1;

    }
}
