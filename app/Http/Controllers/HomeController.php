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
        return view('index',['programs'=>$programs,'students'=>student::all()->count(),'fees_collected'=>DB::table('fees')->sum('amount')]);
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
    public function updateFeeState(Request $request){
        program::query()->update(['payment_active'=>false]);
        foreach ($request->all() as $key => $value) {
            if (is_int($key)) {
                program::where('id',$key)->update(['payment_active'=>true]);
            }
        }
        return redirect()->route('home');
    }
}
