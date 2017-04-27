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
        <a href="/home"><i class="fa fa-home"></i></a> 
        Dispositivos
        <small>Página principal de dispositivos</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" id="multi-drag">
          <?php for($i=0;$i<5;$i++){ ?>
           <div class="col-md-3 col-lg-3 col-xs-6 list-group-item dragme">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3><?=$i?></h3>
      <p>New Orders</p>
    </div>
    <div class="icon">
      <i class="fa fa-desktop"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
          <?php } ?>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@stop
