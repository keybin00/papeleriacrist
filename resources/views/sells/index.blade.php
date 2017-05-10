
@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="/home"><i class="fa fa-home"></i></a>
        Inventario
        <small>Página principal de Inventario</small>
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
        					<table data-url="/sells/get" class="display ajaxTable table table-condensed table-hover table-bordered table-stripped" cellspacing="0" cellpadding="0" width="100%">
        				        <thead>
        				            <tr>
        				                <th>ID</th>
        				                <th>Clave</th>
        				                <th>Cantidad</th>
        				                <th>Total</th>
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
