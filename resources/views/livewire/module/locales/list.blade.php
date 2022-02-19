<div class="float-right text-right">
    <button wire:click='crearLocal()' class="float-right btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>Local</th>
              <th>Administrador</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($locales as $local)
                  <tr>
                    <td>{{$local->id}}</td>
                    <td>{{$local->local}}</td>
                    @if($local->administrador != null)
                    <td>{{$local->administrador->name}}</td>
                    @else
                    <td>Sin Asignar</td>
                    @endif
                    <td> 
                        <button class="btn btn-info" wire:click='editarLocal({{$local->id}})'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>