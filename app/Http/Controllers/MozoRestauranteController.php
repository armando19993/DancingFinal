<?php

namespace App\Http\Controllers;

use App\Models\MozoRestaurante;
use App\Http\Requests\StoreMozoRestauranteRequest;
use App\Http\Requests\UpdateMozoRestauranteRequest;

class MozoRestauranteController extends Controller
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
     * @param  \App\Http\Requests\StoreMozoRestauranteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMozoRestauranteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MozoRestaurante  $mozoRestaurante
     * @return \Illuminate\Http\Response
     */
    public function show(MozoRestaurante $mozoRestaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MozoRestaurante  $mozoRestaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(MozoRestaurante $mozoRestaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMozoRestauranteRequest  $request
     * @param  \App\Models\MozoRestaurante  $mozoRestaurante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMozoRestauranteRequest $request, MozoRestaurante $mozoRestaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MozoRestaurante  $mozoRestaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(MozoRestaurante $mozoRestaurante)
    {
        //
    }
}
