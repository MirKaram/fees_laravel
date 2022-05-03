<?php

namespace App\Http\Controllers;

use App\Models\program;
use Illuminate\Http\Request;
use Exception;

class ProgramController extends Controller
{
    public function index(){
      return view('program.index',['programs'=>program::all()]);
        
    }
   public function create(Request $request){ 
        return view('program.create');
    }
    public function store(Request $request)
    {
        program::create($request->all());
        return view('program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
             return response()->json(program::whereId($id)->first());
         }catch(Exception $ex){
             return response($ex->getMessage());
         }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit".$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
           $model =  program::whereId($id);
            return response($model->update($request->all()) == 1 ? 'updated' : 'error');
        }catch(Exception $ex){
            return response($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "delet-".$id;
    }
    
}
