<div class="float-right text-right">
    <button wire:click='crearCategoria()' class="float-right btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>Categoria</th>
              <th>Administrar</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($categorias as $categoria)
                  <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->categoria}}</td>
                    <td> 
                        <button class="btn btn-info" wire:click='verRelacion({{$categoria->id}})'><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                        <button class="btn btn-primary" wire:click='subcategorias({{$categoria->id}})'><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></button>
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>