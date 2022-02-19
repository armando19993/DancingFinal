<div class="content-row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"><b>Crear Pedido Restaurante</b>
        </div>
      </div>

      <div class="panel-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-md-2 control-label">Mesa Numero:</label>
            <div class="col-md-10">
              <input type="text" placeholder="Mozo" disabled id="title" class="form-control" wire:model="numero_mesa">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">Mozo:</label>
            <div class="col-md-10">
              <select name="" id="" wire:model="mozo" class="form-control">
                  <option value="">SELECCIONE UN MOZO</option>
                  @foreach($mozos as $mozo)
                    <option value="{{$mozo->id}}">{{$mozo->nombre}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          
          <div class="text-right form-group">
            <div class="col-md-offset-2 col-md-10">
              <button class="float-right btn btn-warning" wire:click='vender()'>Regresar</button>
              <button class="float-right btn btn-info" wire:click='storePedido()'>Crear</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>