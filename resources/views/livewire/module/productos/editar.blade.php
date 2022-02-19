<div class="content-row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"><b>Editar Producto</b>
        </div>
      </div>

      <div class="panel-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-md-2 control-label">Producto</label>
            <div class="col-md-10">
              <input type="text" placeholder="Producto" id="title" class="form-control" wire:model="nombre">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">Precio</label>
            <div class="col-md-10">
              <input type="text" placeholder="Precio" id="title" class="form-control" wire:model="precio">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">Codigo Barra</label>
            <div class="col-md-10">
              <input type="text" placeholder="Codigo Barra" id="title" class="form-control" wire:model="codigo_barra">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">Codigo Interno</label>
            <div class="col-md-10">
              <input type="text" placeholder="Codigo Interno" id="title" class="form-control" wire:model="codigo_interno">
            </div>
          </div>
          
          <div class="text-right form-group">
            <div class="col-md-offset-2 col-md-10">
              <button class="float-right btn btn-warning" wire:click='default()'>Regresar</button>
              <button class="float-right btn btn-info" wire:click='updateProducto()'>Actualizar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>