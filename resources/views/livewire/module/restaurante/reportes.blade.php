<div class="float-right text-right">
    <button wire:click='default()' class="float-right btn btn-warning"> Regresar</button>
</div>
<div class="row">
    <div class="col-md-12">
      <h1>Cajas Ultimas</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Caja Id</th>
                <th scope="col">Fecha</th>
                <th scope="col">Creada Por</th>
              </tr>
            </thead>
            <tbody>
                @foreach($cajas as $caja)
                <tr>
                    <th scope="row">{{$caja->id}}</th>
                    <td>{{$caja->fecha_apertura}}</td>
                    <td>{{$caja->usuario->name}}</td>
                    <td> <button class="btn btn-success" wire:click='verCaja({{$caja->id}})'><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button> </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    
</div>