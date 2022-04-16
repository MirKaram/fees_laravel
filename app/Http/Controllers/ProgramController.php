<?php

namespace App\Http\Controllers;

use App\Models\program;
use Illuminate\Http\Request;
use Exception;

class ProgramController extends Controller
{
    public function index(){
        try{
            return response()->json(program::all());
        }catch(Exception $ex){
            return response($ex->getMessage());
        }
    }
   public function create(Request $request){ 
        return response()->json($request->lname);
    }
    public function store(Request $request)
    {
        $_fees = new program();
        $_fees->program_id = $request->input('program_id');
        $_fees->transaction_state = $request->input('transaction_state');
        $_fees->amount = $request->input('amount');
        $_fees->student_id = $request->input('student_id');
        try{
            $_fees->save();
        }catch(Exception $ex){
            return response($ex->getMessage());
        }
        return response()->json($_fees);
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
