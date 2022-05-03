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
                if ($q->exists()) {
                    $_student = $q->first();
                    $_student->program = program::whereId($_student->program_id)->first(); 
                    return $this->responseMessage($_student,'user log in successfully'); 
                }else{
                    return $this->responseMessage(null,"Login failed, Roll number or password is incorrect"); 
                }
            } catch (Exception $th) {
                return $this->responseMessage(null,$th->getMessage());
            }
        }else{
            return $this->responseMessage(null,"roll number and password required");
        }
    }
}
