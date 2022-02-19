<div class="float-right text-right">
    <button wire:click='crearAuditoria()' class="float-right btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>Solicitado Por</th>
              <th>Local</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($auditorias as $auditoria)
                  <tr>
                    <td>{{$auditoria->id}}</td>
                    <td>{{$auditoria->autorizado->name}}</td>
                    <td>{{$auditoria->local->local}}</td>
                    <td>{{$auditoria->fecha}}</td>
                    <td>
                        @if($auditoria->estado == 1)
                        <span class="badge badge-danger">Solicitado</span>
                        @else
                        <span class="badge badge-success">Finalizado</span>
                        @endif
                    </td>
                    <td> 
                        <button class="btn btn-info" wire:click='verRelacion({{$auditoria->id}})'><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                        <button class="btn btn-primary" wire:click='subauditorias({{$auditoria->id}})'><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></button>
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>