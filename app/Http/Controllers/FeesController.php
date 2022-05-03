<?php

namespace App\Http\Controllers;

use App\Models\fees;
use App\Models\program;
use App\Models\student;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class FeesController extends Controller
{
    public function test(Request $r)
    {
        return $_POST['image'];
    }
    public function index(){
        try{
            return response()->json(fees::all());
        }catch(Exception $ex){
            return response($ex->getMessage());
        }
    }
    public function fees_status($id)
    {
        $std = student::whereId($id)->first();
        $prg = program::whereId($std->program_id)->first();
        if ($std->current_semester > $prg->total_semesters) {
            return response('Degree Completed');
        }
        // if ($prg->payment_active == false) {
        //     return response('Fees Payment Not Active');
        // }
        $total_fee = 0;
        if ($std->current_semester === 1) {
            $total_fee += $prg->semester_fee;
            $total_fee += $prg->admission_fee;
            $total_fee += $prg->Lab_fee;
        }else{
            $total_fee = $prg->semester_fee;
        }
        $diff = Carbon::parse('2022-04-18')->diffForHumans(Carbon::now());
        if (strpos($diff, 'after')) {
            $total_fee += $prg->semester_fee; 
        }
        $trnsactions = fees::where(['student_id'=>$std->id,'semester'=>$std->current_semester]);
        if (!$trnsactions->exists()) {
            return response('unpaid');
        }
        $trnsactions_amount = 0;
        foreach ($trnsactions as $value) {
            $trnsactions_amount += $trnsactions->amount;
        }
       
        return $trnsactions_amount >= $total_fee ? response('paid') : response('unpaid');
    }
   public function create(Request $request){ 
        return response()->json($request->lname);
    }
    public function store(Request $request)
    {
        $path = '';
        if ($file = $request->file('image')) {
            // $path = $file->store('toPath', ['disk' => 'public']);
            file_put_contents('/Volumes/disk_1/laravel_workspace/testWebApp/public/images/file__ee.jpg', $file->get());
        }
        $dd = json_decode($request->fees_data);
        $_fees = new fees();
        $_fees->program_id = $dd->program_id;
        $_fees->student_id = $dd->student_id;
        $_fees->transaction_state = $dd->transaction_state;
        $_fees->amount = $dd->amount;
        $_fees->semester = $dd->semester;
        $_fees->transaction_state = $dd->transaction_state;
        // $_fees->receipt_image = $path;
        try{
            $_fees->save();
        }catch(Exception $ex){
            return $this->responseMessage(null,$ex->getMessage());
        }
        return $this->responseMessage($_fees,"Payment receipt received and added to queue to review");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $_GET['image'];
        try{
             return response()->json(fees::whereId($id)->first());
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
           $model =  fees::whereId($id);
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
