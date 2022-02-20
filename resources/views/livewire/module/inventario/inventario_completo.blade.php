<div class="float-right">
    <h3>
    Inventario
 </h3><br>

 <select name=""  id="" wire:model="local" wire:change="cambiarLocal()" class="form-control">
     <option value="">SELECCIONE EL LOCAL A MOSTRAR</option>
     @foreach ($locales as $local)
     <option value="{{$local->id}}">{{$local->local}}</option>
     @endforeach
 </select>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>Producto</th>
              <th>Inventario</th>
            </tr>
          </thead>
          <tbody>
              @if($productos != null)
              @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->producto->nombre}}</td>
                    <td>{{$producto->inventario}}</td>
                    <td><a href="#" wire:click='actualizarInventario({{$producto->id}})' class="btn btn-success">Editar</a></td>
                </tr>
              @endforeach
            @endif
          </tbody>
    </table>
  </div>