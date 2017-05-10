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
        <a href="/devices"><i class="fa fa-tachometer"></i></a> 
          Rentas
        <small>Página principal de rentas</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- <h1>Hola que hace por aquí <%=req.session.user.name%> ?</h1> -->
      <div class="container-fluid">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body" style="min-height: 600px;">
                  <table data-url="/rents/getrents" class="display ajaxTable table table-condensed table-hover table-bordered table-stripped" cellspacing="0" cellpadding="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Equipo Rentado</th>
                                <th>Inició</th>
                                <th>Finalizó</th>
                                <th>Estimado</th>
                                <th>Anticipado</th>
                                <th>Tiempo Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@stop
