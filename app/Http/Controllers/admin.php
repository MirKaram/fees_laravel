<?php

namespace App\Http\Controllers;

use App\Models\odel;
use App\Models\User;
use Illuminate\Http\Request;

class admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = new User();
        $admin->name = "sdaskdjkalsd";
        return view('index');
    }
    public function about()
    {
        return view('about');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function show(odel $odel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function edit(odel $odel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, odel $odel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function destroy(odel $odel)
    {
        //
    }
}
