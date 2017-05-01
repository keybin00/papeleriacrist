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
         
         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Datos de usuario</h3>
           </div>
           <div class="box-body">
             
             <div class="col-md-6 col-md-offset-3">
                 <form role="form" method="POST" action="/devices/create">
                     {{ csrf_field() }}

                     <div class="form-group">
                         <label for="name" class="col-md-4 control-label">Nombre</label>
                         <input id="name" type="text" class="form-control" name="name" required autofocus>
                     </div>

                     <div class="form-group">
                         <label for="category" class="col-md-4 control-label">Categoría</label>
                         <input id="category" type="text" class="form-control" name="category" required autofocus>
                     </div>

                     <div class="form-group">
                         <div class="col-md-12">
                             <button type="submit" class="btn btn-primary btn-lg pull-right">
                                 <i class="fa fa-plus-circle"></i> Crear Dispositivo
                             </button>
                         </div>
                     </div>
                 </form>
             </div>

           </div>
           <!-- /.box-body -->
           <!-- /.box-footer-->
         </div>

         
        <!-- ./col -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@stop
