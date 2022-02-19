
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Desde</label>
            <select name="" id="" wire:model="desde" disabled class="form-control">
                <option value="">SELECCION LOCAL DE SALIDA</option>
                @foreach ($locales as $local)
                <option value="{{$local->id}}" @if($local->id == $desde) selected @endif>{{$local->local}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="">Hasta</label>
            <select name="" id="" wire:model="hasta" disabled class="form-control">
                <option value="">SELECCION LOCAL DE ENTRADA</option>
                @foreach ($locales as $local)
                <option value="{{$local->id}}" @if($local->id == $hasta) selected @endif>{{$local->local}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>



@if($relaciones != null)

<table class="table">
    <thead>
        <tr>
          <th>Producto</th>
          <th>Inventario Disponible</th>
          <th>Inventario a Enviar</th>
          <th>Diferencia</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($relaciones as $relacion)
          <tr>
            <td>{{$relacion->producto->nombre}}</td>
            <td>{{$relacion->inventario_disponible_previo}}</td>
            <td>{{$relacion->cantidad}}</td>
            <td>{{$relacion->inventario_disponible_previo - $relacion->cantidad}}</td>
            <td>
                @if($status == 1)
                <button class="btn btn-success" wire:click='editarDetalle({{$relacion->id}})'>Editar</button>
                @endif
            </td>
          </tr>
          @endforeach
      </tbody>
</table>

@endif


@if($status == 1)
<div class="float-right text-right">
    <button wire:click='cerrarMovimiento()' class="float-right btn btn-danger"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cerrar</button>
</div>
@endif