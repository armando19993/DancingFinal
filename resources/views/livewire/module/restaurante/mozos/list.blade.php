<div class="float-right text-right">
    <button wire:click='default()' class="float-right btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Rergresar</button>
    <button wire:click='crearMozo()' class="float-right btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Mozo</button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>Mozo </th>
              <th>Editar</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($mozos as $mozo)
                  <tr>
                    <td>{{$mozo->id}}</td>
                    <td>{{$mozo->nombre}}</td>
                    <td>
                        <button class="btn btn-success" wire:click='editarMozo({{$mozo->id}})'>Editar</button>
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>