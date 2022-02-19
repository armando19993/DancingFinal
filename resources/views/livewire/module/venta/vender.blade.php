<div class="float-right text-right">
    <button wire:click='vender()' class="float-right btn btn-warning"> Regresar</button>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="">Producto</label>
            <input type="text" class="form-control" wire:model="buscador" wire:keyup="buscar()">
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Agregar</th>
              </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <th scope="row">{{$producto->nombre}}</th>
                    <td>{{$producto->precio}}</td>
                    <td> <button class="btn btn-success" wire:click='agregar({{$producto->id}})'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    <div class="col-md-6">
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
                @foreach($relacion_pedido as $relacion)
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

          
          <div class="text-right">
              <h1>Total: {{$pedido_seleccionado->total}}</h1>
              <button class="btn btn-danger" wire:click='cerrarCuenta()'>Cerrar Cuenta</button>
          </div>
    </div>
</div>