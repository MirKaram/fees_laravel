<?php

namespace App\Http\Controllers;

use App\Models\program;
use Illuminate\Http\Request;
use Exception;

class ProgramController extends Controller
{
    public function index()
    {
        if (!$this->userLogged()) {
            return redirect()->route('login');
        }
        return view('program.index', ['dataList' => program::all()]);
    }
    public function create(Request $request)
    {
        return view('program.create');
    }
    public function store(Request $request)
    {
        program::create($request->all());
        return view('program.index');
    }

    public function show($id)
    {
        try {
            return response()->json(program::whereId($id)->first());
        } catch (Exception $ex) {
            return response($ex->getMessage());
        }
    }

    public function edit($id)
    {
        $program = program::whereId($id)->first();
        // dd($program);
        return view('program.create',['program'=>$program]);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            $model =  program::whereId($id);
            $model->update($data);
            return $this->index();
        } catch (Exception $ex) {
            return response($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        program::destroy($id);
        return $this->index();
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
