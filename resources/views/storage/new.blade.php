@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="/home"><i class="fa fa-home"></i></a>
        Productos
        <small>Crear nuevo producto</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- <h1>Hola que hace por aquí <%=req.session.user.name%> ?</h1> -->
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <!-- Default box -->
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Datos de Producto</h3>
                      </div>
                      <div class="box-body">

                        <div class="col-md-8 col-md-offset-2">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('create') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="key_s" class="col-md-4 control-label">Clave</label>

                                    <div class="col-md-6">
                                        <input id="key_s" type="text" class="form-control" name="key_s" value="{{ old('key_s') }}" required autofocus>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="col-md-4 control-label">Descripción</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">Cantidad Inicial</label>

                                    <div class="col-md-6">
                                        <input id="n" type="number" class="form-control" name="n" value="{{ old('n') }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-md-4 control-label">Cantidad Limite</label>

                                    <div class="col-md-6">
                                        <input id="n_limit" type="number" class="form-control" name="n_limit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-md-4 control-label">Precio</label>

                                    <div class="col-md-6">
                                        <input id="price" type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}" required autofocus>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg pull-right">
                                            <i class="fa fa-plus-circle"></i> Insertar Producto
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                      </div>
                      <!-- /.box-body -->
                      <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@stop
