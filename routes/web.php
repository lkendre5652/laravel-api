<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\Form;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/career/{cid}',function($cid){
    return $cid;
    return view('welcome');
});
Route::get('users',[users::class,'index']);
Route::get('page',[users::class,'pgcreate']);
Route::get('page2',[users::class,'page2']);
Route::get('form',[Form::class,'index']);
Route::post('submit-act',[Form::class,'submitAct']);
