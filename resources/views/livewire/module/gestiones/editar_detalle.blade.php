<div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title"><b>Editar Detalle</b>
      </div>
    </div>

    <div class="panel-body">
      <div class="form-horizontal">
        <div class="form-group">
          <label class="col-md-2 control-label">Producto</label>
          <div class="col-md-10">
            <input type="text" class="form-control" disabled wire:model="producto_nombre">
          </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Inventario Disponible</label>
            <div class="col-md-10">
              <input type="text" class="form-control" disabled wire:model="inventario_disponible">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">Inventario A enviar</label>
            <div class="col-md-10">
              <input type="number" max="{{$inventario_disponible}}" class="form-control" wire:model="inventario_enviar">
            </div>
          </div>
        
        <div class="text-right form-group">
          <div class="col-md-offset-2 col-md-10">
            <button class="float-right btn btn-warning" wire:click='regresarGestion()'>Regresar</button>
            <button class="float-right btn btn-info" wire:click='updateDetalle()'>Guardar</button>
          </div>
        </div>
    </div>
    </div>
  </div>