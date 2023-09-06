<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    //  get all records
    public function index(){
        $students = Student::all();
        if($students->count() > 0 ){
            return response()->json([
                'status' => 200,
                'students' => $students,
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "Oops!,No Records Found!!",
            ],200);
        }              
    }

    // insert records in database
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'contact' => 'required|digits:10'
        ]);

        if( $validator->fails() ){
            // errors
            return response()->json([   
                'status' => 422,
                'errors'=> $validator->messages()
            ],422);
            
        }else{
            // success
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
            ]);

            if($student){
                // success
                return response()->json([
                    'status' => 200,
                    'message' => 'Student created successfully'
                ],200);
            }else{
                // error
                return response()->json([
                    'status' => 500,
                    'message' => 'Student does not created successfully'
                ],200);
            }
        }
    }

    // get single students records
    public function singleRecords(Request $request,$id){
        $student = Student::find($id );
        if( $student ){
            return response()->json([
                'status' => 200,
                'student' => $student
            ],200);
        }else{
            return response()->json([
                'status' => 200,
                'message' => "No such student found!"
            ],404);
        }
    }


    // 
    public function recordEdit(Request $request, $id){

        $student = Student::find($id );
        if( $student ){
            return response()->json([
                'status' => 200,
                'student' => $student
            ],200);
        }else{
            return response()->json([
                'status' => 200,
                'message' => "No such student found!"
            ],404);
        }


    }
    // update records 
    public function recordUpdate(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'contact' => 'required|digits:10'
        ]);

        if( $validator->fails() ){
            // errors
            return response()->json([   
                'status' => 422,
                'errors'=> $validator->messages()
            ],422);
            
        }else{
            // success
            $student = Student::find($id);
            

            if($student){
                // success
                $student->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Student created successfully'
                ],200);
            }else{
                // error
                return response()->json([
                    'status' => 404,
                    'message' => 'Student does not created successfully'
                ],404);
            }
        }               
    }

    public function remove(Request $request,$id){
        $student = Student::find( $id );
        if( $student ){
            $student->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Your record is removed!!'
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Oops!, record is not exists!!'
            ],404);
        }

    }

}