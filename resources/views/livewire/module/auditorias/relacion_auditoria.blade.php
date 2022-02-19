<div class="float-right">
    <h3>
    Local: {{$auditoria->local->local}} <br>
    Fecha: {{$auditoria->fecha}} <br>
    Estado: @if($auditoria->estado == 1)
    <span class="badge badge-danger">Solicitado</span>
    @else
    <span class="badge badge-success">Finalizado</span>
    @endif </h3><br>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>Producto</th>
              <th>Cargado Por</th>
              <th>Existencias Sistemas</th>
              <th>Existencias Fisicas</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($relaciones_auditoria as $relacion)
                <tr>
                    <td>{{$relacion->producto->nombre}}</td>
                    @if($relacion->cargado_por != null)
                    <td>{{$relacion->cargado_por->name}}</td>
                    @else
                    <td></td>
                    @endif
                    <td>{{$relacion->debe_haber}}</td>
                    <td>{{$relacion->existencias}}</td>
                    <td>
                        <button class="btn btn-success" wire:click='editarMovimiento({{$relacion->id}})'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                    </td>
                </tr>
              @endforeach
            
            
          </tbody>
    </table>
  </div>