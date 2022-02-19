<div class="float-right text-right">
    <button wire:click='default()' class="float-right btn btn-warning"> Regresar</button>
</div>
<div class="row">
    <div class="col-md-6">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Pedido ID</th>
                <th scope="col">Monto</th>
                <th scope="col">Tipo de Pago</th>
              </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <th scope="row"><a href="#" wire:click='cargarPedido({{$pedido->id}})'>{{$pedido->id}}</a></th>
                    <td>{{$pedido->total}}</td>
                    <td>
                        @if($pedido->tipo_pago == 1)
                            <span class="badge badge-success">Efectivo</span>
                        @else
                            <span class="badge badge-danger">Visa</span>
                        @endif
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    @if($this->pedido_seleccionado != null)
    <div class="col-md-6">
        <h3>
            Mozo: {{$pedido_seleccionado->mozo->nombre}} <br>
            Mesa: {{$pedido_seleccionado->mesa->numero_mesa}}
        </h3>
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody>
                @foreach($pedido_seleccionado->relacion as $relacion)
                <tr>
                    <th scope="row">{{$relacion->producto->nombre}}</th>
                    <td>{{$relacion->producto->precio}}</td>
                    <td>{{$relacion->cantidad}}</td>
                    <td>{{$relacion->total}}</td>
                    <td>
                        <button class="btn btn-success" wire:click='sumarCtda({{$relacion->id}})'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                        <button class="btn btn-warning" wire:click='restarCtda({{$relacion->id}})'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                        <button class="btn btn-danger" wire:click='eliminarRel({{$relacion->id}})'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    @endif
</div>