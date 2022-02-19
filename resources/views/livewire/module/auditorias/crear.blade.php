<div class="content-row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title"><b>Crear Auditoria</b>
        </div>
      </div>
  
      <div class="panel-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-md-2 control-label">Local</label>
            <div class="col-md-10">
              <select name="" class="form-control" wire:model="local" id="">
                  <option value="">SELECCIONE LOCAL</option>
                  @foreach ($locales as $local)
                    <option value="{{$local->id}}">{{$local->local}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          
          <div class="text-right form-group">
            <div class="col-md-offset-2 col-md-10">
              <button class="float-right btn btn-warning" wire:click='default()'>Regresar</button>
              <button class="float-right btn btn-info" wire:click='storeAuditoria()'>Solicitar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>