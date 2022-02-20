<div class="float-right text-right">
    <button wire:click='default()' class="float-right btn btn-warning"> Regresar</button>
</div>
<div class="row">
    <div class="col-md-12">
      <h2>Detalle de la caja: {{$caja_data->fecha_apertura}}</h2>
        
    </div>
    

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Pedido Numero</th>
            <th scope="col">Monto en Soles</th>
            <th scope="col">Tipo de Pago</th>
          </tr>
        </thead>
        <tbody>
            @foreach($caja_data->pedidos as $relacion)
            <tr>
                <th>{{$relacion->id}}</th>
                <th>{{$relacion->total}}</th>
                <th>
                    @if($relacion->tipo_pago == 1)
                    <span class="badge badge-success">Efectivo</span>
                    @else
                        <span class="badge badge-danger">Visa</span>
                    @endif
                </th>
              </tr>
              @endforeach
        </tbody>
        
      </table>

      <h3>Efectivo: S/ {{$efectivo}}</h3> 
      <h3>Visa: S/ {{$visa}}</h3> <br>
</div>