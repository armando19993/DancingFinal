<div class="row">
    @if($caja > 0)
    <div class="col-md-2">
        <dic class="p-3 card" wire:click='vender()'>
            <div class="text-center card-body bg-success" style="padding: 10px;">
                <span class="glyphicon glyphicon-shopping-cart" style="font-size: 60px"></span> <br>
                Vender
            </div>
        </dic>
    </div>
    @endif

    <div class="col-md-2">
        <dic class="p-3 card" wire:click='reportes()'>
            <div class="text-center card-body bg-success" style="padding: 10px;">
                <span class="glyphicon glyphicon-folder-open" style="font-size: 60px"></span> <br>
                Reportes
            </div>
        </dic>
    </div>

    <div class="col-md-2">
        <dic class="p-3 card" wire:click='Reportes()'>
            <div class="text-center card-body bg-success" style="padding: 10px;">
                <span class="glyphicon glyphicon-ok" style="font-size: 60px"></span> <br>
                Auditorias
            </div>
        </dic>
    </div>


    @if($caja > 0)
    <div class="col-md-2">
        <dic class="p-3 card" wire:click='CerrarCaja()'>
            <div class="text-center card-body bg-danger" style="padding: 10px;">
                <span class="glyphicon glyphicon-user" style="font-size: 60px"></span> <br>
                Cerrar Caja
            </div>
        </dic>
    </div>
    @else
    <div class="col-md-2">
        <dic class="p-3 card" wire:click='AbrirCaja()'>
            <div class="text-center card-body bg-info" style="padding: 10px;">
                <span class="glyphicon glyphicon-shopping-cart" style="font-size: 60px"></span> <br>
                Abrir Caja
            </div>
        </dic>
    </div>
    @endif
</div>