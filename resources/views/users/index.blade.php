@extends('layouts.app')

@section('content')

<h1>Users</h1>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body" style="min-height: 600px;">
					<a class="btn btn-danger btn-md pull-right" href="/users/new">Nuevo Usuario</a>
					<table data-url="/users/getusers" class="display ajaxTable table table-condensed table-hover table-stripped" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>ID</th>
				                <th>Nombre</th>
				                <th>Apellido</th>
				                <th>Correo</th>
				                <th>Teléfono</th>
				                <th>Usuario</th>
				                <th>Rol</th>
				                <th>Opciones</th>
				            </tr>
				        </thead>
				    </table>
				</div>
			</div>
		</div>
	</div>
@stop