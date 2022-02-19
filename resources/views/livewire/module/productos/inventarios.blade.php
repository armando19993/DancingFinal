<div class="float-right text-right">
    
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>Local</th>
              <th>Inventario</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($inventarios as $inventario)
                  <tr>
                    <td>{{$inventario->id}}</td>
                    <td>{{$inventario->local->local}}</td>
                    <td>{{$inventario->inventario}}</td>
                    <td> 
                        <button class="btn btn-info" wire:click='editarInventario({{$inventario->id}})'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>