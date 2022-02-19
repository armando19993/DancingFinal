<div class="content-row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"><b>Editar Local</b>
        </div>
      </div>

      <div class="panel-body">
        <form novalidate="" role="form" class="form-horizontal">
          <div class="form-group">
            <label class="col-md-2 control-label">Local</label>
            <div class="col-md-10">
              <input type="text" placeholder="Local" id="title" class="form-control" wire:model="local">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Administrador</label>
            <div class="col-md-10">
              <select wire:model="administrador_id" id="" class="form-control">
                  <option value="">SELECCIONE</option>
                  @foreach ($administradores as $administrador)
                    <option value="{{$administrador->id}}">{{$administrador->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="text-right form-group">
            <div class="col-md-offset-2 col-md-10">
              <button class="float-right btn btn-info" wire:click='updateLocal()'>Editar</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>