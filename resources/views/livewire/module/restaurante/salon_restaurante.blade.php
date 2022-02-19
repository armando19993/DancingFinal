<div class="float-right text-right">
    <button wire:click='default()' class="float-right btn btn-warning"> Regresar</button>
</div>
<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Ventas Visa</th>
            <th scope="col">Ventas Efectivo</th>
            <th scope="col">Total Venta</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{$visa}}</th>
            <td>{{$efectivo}}</td>
            <td>{{$efectivo + $visa}}</td>
          </tr>
        </tbody>
      </table>
</div>


<div class="row">
@foreach ($mesas_data as $mesa)
<div class="col-md-2 col-sm-3">
    @if($mesa->pedido == null)
        <div class="p-3 card" wire:click='nuevoPedido({{$mesa->id}})'>
    @else
        <div class="p-3 card" wire:click='editarPedido({{$mesa->pedido->id}})'>
    @endif
            <div class="text-center card-body bg-success" style="padding: 10px;">
                <img src="mesa.png" width="50%" alt=""> <br>
                Mesa: {{$mesa->numero_mesa}}
                <br>
                @if($mesa->pedido != null)
                Total: {{$mesa->pedido->total}}
                @else
                <br>
                @endif
            </div>
        </div>
    </div>
@endforeach
    
</div>