<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1/service')->group(function () {
    Route::get('students',[StudentsController::class,'index']);
    Route::post('students',[StudentsController::class,'store']);
    Route::get('students/{id}',[StudentsController::class,'singleRecords']);
    Route::get('students/{id}/edit',[StudentsController::class,'recordEdit']);
    Route::put('students/{id}/edit',[StudentsController::class,'recordUpdate']);
    Route::delete('students/{id}/remove',[StudentsController::class,'remove']);
});
// Route::get('students',[StudentsController::class,'index']);
// Route::post('students',[StudentsController::class,'store']);
// Route::get('students/{id}',[StudentsController::class,'singleRecords']);

// Route::get('students',function(){
//     return 'this is students api';
// });
