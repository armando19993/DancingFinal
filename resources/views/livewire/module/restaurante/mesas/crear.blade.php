<div class="content-row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"><b>Crear Mesa Restaurante</b>
        </div>
      </div>

      <div class="panel-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-md-2 control-label">Numero de Mesa</label>
            <div class="col-md-10">
              <input type="text" placeholder="Mesa" id="title" class="form-control" wire:model="mesa">
            </div>
          </div>
          
          <div class="text-right form-group">
            <div class="col-md-offset-2 col-md-10">
              <button class="float-right btn btn-warning" wire:click='GestionMesas()'>Regresar</button>
              <button class="float-right btn btn-info" wire:click='storeMesa()'>Crear</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>