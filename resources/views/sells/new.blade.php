@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="/home"><i class="fa fa-home"></i></a>
        Venta
        <small>Realizar venta</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <!-- Default box -->
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Nueva Venta</h3>
                      </div>
                      <div class="box-body">
                        <div class="col-md-12 col-md-offset-1">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <input id="clave_producto" type="text" placeholder="Clave de Producto" class="form-control" required autofocus>
                                    </div>
                                    <div class="col-md-2">
                                      <input id="cantidad" type="number" placeholder="Cantidad" class="form-control" value="0" required autofocus>
                                    </div>
                                    <div class="col-md-2">
                                      <input id="button" type="submit" class="form-control" value="Agregar" onclick="getNewProduct()" autofocus>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-11">
                          <table data-url="" class="display table table-condensed table-hover table-bordered table-stripped" cellspacing="0" cellpadding="0" width="100%">
                				        <thead>
                				            <tr>
                				                <th>Descripción</th>
                				                <th>Precio</th>
                				                <th>Cantidad</th>
                                        <th>Subtotal</th>
                				                <th></th>
                				            </tr>
                				        </thead>
                                <tbody>


                                </tbody>




                				    </table>
                        </div>

                        <div class="col-md-12 col-md-offset-8">
                          <div class="form-group">
                            <div class="col-md-2">
                            <label for="total" class="control-label">Total:</label>
                            <input id="total" name="total" type="text" class="col-md-12 form-control" value="0" readonly="" autofocus>
                            <button type="submit" class="btn btn-primary btn-lg" onclick="registerSell()">
                              <i class="fa fa-plus-circle"></i> Realizar venta
                            </button>
                          </div>
                          </div>
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
  <script>
  token= "{{ csrf_token() }}";
  products=[];
  total=0;
  </script>
@stop
