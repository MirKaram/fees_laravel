<?php

namespace App\Http\Controllers;

use App\Models\program;
use App\Models\student;
use Illuminate\Http\Request;
use Exception;

class StudentController extends Controller
{
    public function login(Request $request){
        if ($request->roll_no && $request->password) {
            try {
                $q = student::where(['roll_no'=>$request->roll_no,'password'=>$request->password]);
                $_student = $q->first();
                $_student->program = program::whereId($_student->program_id)->first(); 
                return $q->exists() ? response()->json(["success"=> true,"message"=>'user log in successfully', 'data'=> $_student]) : response()->json(["success"=> false,"message"=>"Login failed, Roll number or password is incorrect"]); 
            } catch (Exception $th) {
                return response()->json(["success"=> false,"message"=>$th->getMessage()]);
            }
        }else{
            return response()->json(["success"=> false,"message"=>"roll number and password required"]);
        }
    }
}
