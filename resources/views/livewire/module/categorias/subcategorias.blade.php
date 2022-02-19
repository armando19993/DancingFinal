<div class="float-right text-right">
    <button wire:click='crearSubCategoria()' class="float-right btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>
    <button wire:click='default()' class="float-right btn btn-warning"> Regresar</button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>SubCategoria</th>
              <th>Administrar</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($subcategorias_data as $subcategoria)
                  <tr>
                    <td>{{$subcategoria->id}}</td>
                    <td>{{$subcategoria->sub_categoria}}</td>
                    <td> 
                        <button class="btn btn-info" wire:click='editarSubcategoria({{$subcategoria->id}})'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                    </td>
                  </tr>
              @endforeach
            
          </tbody>
    </table>
  </div>