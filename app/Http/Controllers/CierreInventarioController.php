<?php

namespace App\Http\Controllers;

use App\Models\CierreInventario;
use App\Http\Requests\StoreCierreInventarioRequest;
use App\Http\Requests\UpdateCierreInventarioRequest;

class CierreInventarioController extends Controller
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
     * @param  \App\Http\Requests\StoreCierreInventarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCierreInventarioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CierreInventario  $cierreInventario
     * @return \Illuminate\Http\Response
     */
    public function show(CierreInventario $cierreInventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CierreInventario  $cierreInventario
     * @return \Illuminate\Http\Response
     */
    public function edit(CierreInventario $cierreInventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCierreInventarioRequest  $request
     * @param  \App\Models\CierreInventario  $cierreInventario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCierreInventarioRequest $request, CierreInventario $cierreInventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CierreInventario  $cierreInventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(CierreInventario $cierreInventario)
    {
        //
    }
}
