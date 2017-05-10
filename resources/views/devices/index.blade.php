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
      @if (session()->has('flash_notification.message'))
          <div class="alert alert-{{ session('flash_notification.level') }}">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {!! session('flash_notification.message') !!}
          </div>
      @endif
        <div class="row" id="multi-drag">
          @if(count($devices) > 0)
            @foreach ($devices as $device)
              @include('devices.device')
            @endforeach
          @else
            <div class="callout callout-info">
              <h4>Aún no hay dispositivos.</h4>
              <p>No se encontraron dispositivos dados de alta. PUedes dar de alta nuevos dispositivos en la seccion dispositivos.</p>
            </div>
          @endif

          <!-- ./col -->
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@stop
