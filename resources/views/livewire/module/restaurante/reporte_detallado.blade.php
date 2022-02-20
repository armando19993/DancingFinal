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
            <th scope="col">Producto</th>
            <th scope="col">Inicio</th>
            <th scope="col">Final</th>
            <th scope="col">Vendidos</th>
            <th scope="col">Monto en Soles</th>
          </tr>
        </thead>
        <tbody>
            @foreach($caja_data->relacion as $relacion)
            <tr>
                <th scope="row">{{$relacion->producto->nombre}}</th>
                <th>{{$relacion->inicio}}</th>
                <th>{{$relacion->fin}}</th>
                <th>{{$relacion->vendidos}}</th>
                <th>{{$relacion->vendidos * $relacion->producto->precio}}</th>
              </tr>
            @endforeach
          
        </tbody>
      </table>

      <h3>Efectivo: S/ {{$efectivo}}</h3> 
      <h3>Visa: S/ {{$visa}}</h3> <br>
</div>