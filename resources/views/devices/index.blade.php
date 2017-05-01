@extends('layouts.app')

@section('content')
<style>
/* Prevent the text contents of draggable elements from being selectable. */

.dragme{
  cursor: move;
  border: none;
  background-color: transparent!important;    
}


li#devicesList{display: inline-block;}
.ghost {
  opacity: 0.4;
}
.chosen {
  
  background-color: #00C0EF;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="/devices"><i class="fa fa-home"></i></a> 
        Dispositivos
        <small>Página principal de dispositivos</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" id="multi-drag">
          @foreach ($devices as $device)
            <div class="col-md-3 col-lg-3 col-xs-6 list-group-item dragme">
            @if ($device->rented)
                <div class="small-box bg-green">
            @else
                <div class="small-box bg-red">
            @endif
                <div class="inner">
                  <h3>0.00</h3>
                  <p>{{ $device->name }}</p>
                </div>
                <div class="icon">
                  <i class="fa fa-desktop"></i>
                </div>
                <a href="#" class="small-box-footer">
                  <i class="fa fa-power-off"></i>
                </a>
              </div>
            </div>
          @endforeach
          <!-- ./col -->
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@stop
