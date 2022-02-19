<div class="float-right text-right">
    <button wire:click='crearProducto()' class="float-right btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Ver Inventario</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($productos as $producto)
                  <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->precio}}</td>
                    <td> 
                        <button class="btn btn-info" wire:click='editarProducto({{$producto->id}})'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                        <button class="btn btn-info" wire:click='verInventario({{$producto->id}})'><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></button>
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>