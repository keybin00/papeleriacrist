@extends('layouts.app')

@section('content')
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
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body" style="min-height: 600px;">
                <table data-url="/devices/getdevices" class="display ajaxTable table table-condensed table-hover table-bordered table-stripped" cellspacing="0" cellpadding="0" width="100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Categoría</th>
                              <th>Opciones</th>
                          </tr>
                      </thead>
                  </table>
                <a style="margin-top:15px;"class="btn btn-lg btn-danger pull-right" href="/devices/new"><i class="fa fa-desktop"></i>  Nuevo Dispositivo</a>
              </div>
            </div>
          </div>  
        <!-- ./col -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@stop
