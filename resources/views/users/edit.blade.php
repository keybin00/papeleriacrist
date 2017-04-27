@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="/home"><i class="fa fa-home"></i></a> 
        Usuarios
        <small>Editar usuario</small>
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
                        <h3 class="box-title">Datos de usuario</h3>
                      </div>
                      <div class="box-body">
                        
                        <div class="col-md-8 col-md-offset-2">
                            <form class="form-horizontal" role="form" method="POST" action="/users/update/<?=$user->id?>">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="<?=$user->name?>" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Apellido</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="<?=$user->lastname?>" required autofocus>

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?=$user->email?>" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Teléfono</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="<?=$user->phone?>">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="<?=$user->username?>" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role" class="col-md-4 control-label">Permisos</label>

                                <div class="col-md-6">
                                    <select name="role" id="role" class="form-control">
                                        <option value="-1">Selecciona un opción</option>
                                        <option <?=$user->role === 'admin'?'selected':''?> value="admin">Administrador</option>
                                        <option <?=$user->role === 'user'?'selected':''?> value="user">Usuario</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg pull-right">
                                        <i class="fa fa-check"></i> Actualizar Usuario
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

