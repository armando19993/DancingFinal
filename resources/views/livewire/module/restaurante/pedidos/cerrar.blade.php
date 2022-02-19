<div class="float-right text-right">
    <button wire:click='ventaseleccionada()' class="float-right btn btn-warning"> Regresar</button>
</div>
<div class="content-row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"><b>Detalle Cuenta</b>
        </div>
      </div>

      <div class="panel-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-md-2 control-label">Total a Pagar:</label>
            <div class="col-md-10">
              <input type="text" placeholder="Mesa" disabled id="title" class="form-control" wire:model="total_pagar">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">Tipo Pago:</label>
            <div class="col-md-10">
              <select name="" class="form-control" wire:model="tipo_pago" id="">
                  <option value="">SELECCIONE EL METODO DE PAGO</option>
                  <option value="1">EFECTIVO</option>
                  <option value="2">TARJETA</option>

              </select>
            </div>
          </div>
          
          <div class="text-right form-group">
            <div class="col-md-offset-2 col-md-10">
              <button class="float-right btn btn-info" wire:click='procesarCuenta()'>Crear</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>