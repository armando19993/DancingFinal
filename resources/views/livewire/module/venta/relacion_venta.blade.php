<div class="float-right text-right">
    <button wire:click='vender()' class="float-right btn btn-warning"> Regresar</button>
</div>

<h1>Producto: {{$producto->nombre}}</h1>
<div class="row">
    <div class="col-md-3">
        .
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="">Cantidad</label>
            <input type="text" class="form-control input-lg" autofocus wire:model="cantidad_producto">
        </div>
    </div>

    <div class="col-md-3">
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        
    </div>
    <div class="text-center col-md-3 bg-success " wire:click='pago(1)'>
        <span class="glyphicon glyphicon-ok" style="font-size: 40px "></span> <br>
        Efectivo
    </div>
    <div class="text-center col-md-3 bg-warning" wire:click='pago(2)'>
        <span class="glyphicon glyphicon-credit-card" style="font-size: 40px "></span> <br>
        Visa
    </div>
    <div class="col-md-3">
        
    </div>
</div>
    
    
