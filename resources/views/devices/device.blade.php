<div class="col-md-3 col-lg-3 col-xs-6 list-group-item dragme" data-device="<?=$device->id?>">
  @if ($device->rented)
    <div class="small-box bg-green clock-style">
  @else
    <div class="small-box <?= $device->working?'bg-aqua':'bg-yellow' ?> clock-style">
  @endif
    <div class="inner">
    @if ($device->working)
      <p><a href="/devices/turnoff/<?=$device->id?>" class="btn btn-md btn-danger" title="Cambiar a estado Fuera de servicio."><i class="fa fa-thumbs-o-down"></i></a></p>
    @else
      <p><a href="/devices/turnon/<?=$device->id?>" class="btn btn-md btn-primary" title="Cambiar a estado Activo"><i class="fa fa-thumbs-o-up"></i></a></p>
    @endif
    <small>Tiempo Restante</small>
      <?php if( isset($rents[$device->id]) ){ ?>
          <h4 data-rent="<?=$rents[$device->id]->id?>" data-value="<?= $rents[$device->id]->stimated ?>" class="clock-container"></h4>
      <?php } else{?>
        <h4 data-value="<?= $currTime ?>" class="clock-container"></h4>
      <?php } ?>
      <p>{{ $device->name }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-desktop"></i>
    </div>
    @if($device->working)
      @if($device->rented)
        <?php if( isset($rents[$device->id]) ){ ?>
          <a data-rent="<?=$rents[$device->id]->id?>" data-title="Finalizar Renta {{$device->name}}" class="btn btn-block btn-info close-rent"><i class="fa fa-hourglass-half"><b>&nbsp;Finalizar Renta</b></i></a>
        <?php } ?>
      @else
        <button data-url="/devices/newrent/{{$device->id}}" data-title="Nueva Renta {{$device->name}}" class="btn btn-block btn-primary btn-device-action"><i class="fa fa-hourglass-1"></i><small><b>&nbsp;Rentar</b></small></button>
      @endif
    @endif
  </div>
</div>
