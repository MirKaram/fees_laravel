<?php

namespace App\Http\Controllers;

use App\Models\program;
use App\Models\student;
use Illuminate\Http\Request;
use Exception;

class StudentController extends Controller
{
    public function index(){
        if(!$this->userLogged()){
            return view('login');
        }
        $l = student::all();
        for($i = 0; $i<$l->count($l) ;$i++){
            $l[$i]->program = program::where(["id"=>$l[$i]->program_id])->first()->name;
        }
        return view('student.index',['dataList'=>$l]);
    }
    public function create(){ 
        $programs = program::all();
        return view('student.create',['programs'=>$programs]);
    }
    public function store(Request $request)
    {
        $std = $request->all();
        unset($std['_token']);
        student::create($std);
        return $this->index();
    }
    public function edit($id)
    {
        $programs = program::all();
        $std = student::where('id',$id)->first();
        return view('student.create',['update'=>true,'student'=>$std,'programs'=>$programs]); 
    }
    public function update(Request $request, $id)
    {
        $std = $request->all();
        unset($std['_token']);
        student::findOrFail($id)->fill($std)->save();
        return $this->index();
    }
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
