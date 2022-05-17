<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseMessage($data,$message)
    {
        return response()->json(["success"=>$data!=null,'message'=>$message,'data'=>$data]);
    }
    public function setUser($user){
        session(['user_'=>$user]);
    }
    public function logoutUser(){
        session()->flush();
    }
    public function userLogged(){
        return session()->has('user_');
    }
}
