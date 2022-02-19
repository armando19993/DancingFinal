<?php

namespace App\Http\Controllers;

use App\Models\MesasRestaurante;
use App\Http\Requests\StoreMesasRestauranteRequest;
use App\Http\Requests\UpdateMesasRestauranteRequest;

class MesasRestauranteController extends Controller
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
     * @param  \App\Http\Requests\StoreMesasRestauranteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMesasRestauranteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MesasRestaurante  $mesasRestaurante
     * @return \Illuminate\Http\Response
     */
    public function show(MesasRestaurante $mesasRestaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MesasRestaurante  $mesasRestaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(MesasRestaurante $mesasRestaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMesasRestauranteRequest  $request
     * @param  \App\Models\MesasRestaurante  $mesasRestaurante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMesasRestauranteRequest $request, MesasRestaurante $mesasRestaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MesasRestaurante  $mesasRestaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(MesasRestaurante $mesasRestaurante)
    {
        //
    }
}
