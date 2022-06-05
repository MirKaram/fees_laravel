<?php

namespace App\Http\Controllers;

use App\Models\fees;
use App\Models\program;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{   

    public function index()
    {
        if(!$this->userLogged()){
            return view('login');
        }
        $programs = program::all();
        $xValues = [];
        $yValues = [];
        
        foreach($programs as $item){
            $xValues[] =  $item->name;
            $yValues[] = fees::where([['program_id','=',$item->id],['created_at','>',date('Y-m-d H:i:s',strtotime("-1 month"))]])->sum('amount');
        }
        $total_students = student::all()->count();
        return view('index',['xValues'=>$xValues,'yValues'=>$yValues,'programs'=>$programs,'students'=>$total_students,'fees_collected'=>DB::table('fees')->sum('amount')]);
    }
    public function loginview()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        // dd($request->password);
        // dd(user::where(['usetname'=>$request->email,'password'=>$request->password])->exists());
        if (user::where(['usetname'=>$request->email,'password'=>$request->password])->exists()) {
            $this->setUser($request->email);
            return $this->index();
        }
        return view('login',['error'=>"Invalid username/password"]);
    }
    public function logout()
    {
        $this->logoutUser();
        return redirect('login');
    }
    public function about()
    {
        return view('about');
    }
}
