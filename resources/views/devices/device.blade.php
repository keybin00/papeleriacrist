<div class="col-md-3 col-lg-3 col-xs-6 list-group-item dragme">
  @if ($device->rented)
    <div class="small-box bg-green clock-style">
  @else
    <div class="small-box bg-aqua clock-style">
  @endif
    <div class="inner">
      <?php if( isset($rents[$device->id]) ){ ?>
          <h3 data-rent="<?=$rents[$device->id]->id?>" data-value="<?= $rents[$device->id]->stimated ?>" class="clock-container"></h3>
      <?php } else{?>
        <h3 data-value="<?= $currTime ?>" class="clock-container"></h3>
      <?php } ?>
      <p>{{ $device->name }}</p>
    </div>
    <div class="icon">
      <i class="fa fa-desktop"></i>
    </div>
    <button data-url="/devices/newrent/{{$device->id}}" data-title="Nueva Renta {{$device->name}}" class="btn btn-block btn-primary btn-device-action"><i class="fa fa-power-off"></i></button>
  </div>
</div>
