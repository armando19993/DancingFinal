<div class="float-right text-right">
    <button wire:click='default()' class="float-right btn btn-warning"> Regresar</button>
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
                <th scope="col">Efectivo</th>
                <th scope="col">Visa</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="col">{{$efectivo}}</th>
                <th scope="col">{{$visa}}</th>
                <th scope="col">{{$efectivo + $visa}}</th>
              </tr>
            </tbody>
          </table>

          
          <div class="text-right">
              <button class="btn btn-danger" wire:click='cerrarCuenta()'>Cerrar Cuenta</button>
          </div>
    </div>
</div>