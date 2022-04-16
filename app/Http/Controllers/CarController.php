<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = car::all();
        $data = car::orderBy('name', 'asc')->get();
        // $data = car::chunk(1,function($cars){
        //     foreach($cars as $i){
        //         print_r($i);
        //     }
        // });
        log(DB::unprepared(file_get_contents('/')));
        return view('cars.index', ['cars' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $car = new car;
        // $car->name = $request->input('name');
        // $car->founded = $request->input('found');
        // $car->description = $request->input('description');
        // $car->product_code = $request->input('product_code');
        // $car->phone_number = $request->input('phone_number');
        // $car->save();

        car::create([
            'name' => $request->name,
            'founded' => $request->found,
            'description' => $request->description,
            'product_code' => $request->product_code,
            'phone_number' => $request->phone_number
        ]);
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = car::where('name','audi')->get();
        $data = car::where([['name','=',$id]])->latest('created_at')->take(1)->orderBy('name','asc')->get();
        return view('cars.index', ['cars' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
