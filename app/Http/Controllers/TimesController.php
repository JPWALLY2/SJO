<?php

namespace App\Http\Controllers;

use App\Models\Times;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Times::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Times $times)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Times $times)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Times $times)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Times $times)
    {
        //
    }
}
