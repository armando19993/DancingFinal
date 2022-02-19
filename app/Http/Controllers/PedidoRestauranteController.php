<?php

namespace App\Http\Controllers;

use App\Models\PedidoRestaurante;
use App\Http\Requests\StorePedidoRestauranteRequest;
use App\Http\Requests\UpdatePedidoRestauranteRequest;

class PedidoRestauranteController extends Controller
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
     * @param  \App\Http\Requests\StorePedidoRestauranteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRestauranteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PedidoRestaurante  $pedidoRestaurante
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoRestaurante $pedidoRestaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PedidoRestaurante  $pedidoRestaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoRestaurante $pedidoRestaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoRestauranteRequest  $request
     * @param  \App\Models\PedidoRestaurante  $pedidoRestaurante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoRestauranteRequest $request, PedidoRestaurante $pedidoRestaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PedidoRestaurante  $pedidoRestaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoRestaurante $pedidoRestaurante)
    {
        //
    }
}
