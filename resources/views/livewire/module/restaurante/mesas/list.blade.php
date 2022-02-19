<div class="float-right text-right">
    <button wire:click='default()' class="float-right btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Rergresar</button>
    <button wire:click='crearMesa()' class="float-right btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Mesa</button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>Mesa </th>
              <th>Editar</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($mesas as $mesa)
                  <tr>
                    <td>{{$mesa->id}}</td>
                    <td>Mesa N°: {{$mesa->numero_mesa}}</td>
                    <td>
                        <button class="btn btn-success" wire:click='editarMesa({{$mesa->id}})'>Editar</button>
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>