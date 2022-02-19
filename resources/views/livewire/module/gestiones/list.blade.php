<div class="float-right text-right">
    <button wire:click='crearMovimiento()' class="float-right btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Movimiento</button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>Autorizado por</th>
              <th>Desde</th>
              <th>Hasta</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($gestiones as $gestion)
                  <tr>
                    <td>{{$gestion->id}}</td>
                    <td>{{$gestion->autorizado->name}}</td>
                    <td>{{$gestion->l_salida->local}}</td>
                    <td>{{$gestion->l_entrada->local}}</td>
                    <td> 
                        <button class="btn btn-success" wire:click='editarMovimiento({{$gestion->id}})'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                        @if($gestion->status == 2 && Auth::user()->tipo_usuario == 1)
                        <button class="btn btn-info" wire:click='editargestion({{$gestion->id}})'>Desbloquear</button>
                        @elseif($gestion->status == 1 && Auth::user()->tipo_usuario == 1)
                        <button class="btn btn-danger" wire:click='editargestion({{$gestion->id}})'>Cerrar</button>
                        @endif
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>