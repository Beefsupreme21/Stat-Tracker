<?php

namespace App\Http\Controllers;

use App\Models\season;
use App\Http\Requests\StoreseasonRequest;
use App\Http\Requests\UpdateseasonRequest;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreseasonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreseasonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateseasonRequest  $request
     * @param  \App\Models\season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateseasonRequest $request, season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(season $season)
    {
        //
    }
}
