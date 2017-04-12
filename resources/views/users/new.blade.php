@extends('layout')

@section('content')
  <script type="text/javascript">
   $(document).ready(function() {
      $('select').material_select();
    });
</script>
   <div class="row " style="margin-top: 50px">
            <form class="col s8 offset-s3" method="post" action="/users/create">
              <div class="row">
                <div class="input-field col s4">
                  <input name="name" id="name" type="text" class="validate">
                  <label for="name">Nombre</label>
                </div>
                <div class="input-field col s4">
                  <input name="lastname" id="lastsname" type="text" class="validate">
                  <label for="lastname">Apellido</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input name="username" id="user" type="text" class="validate">
                  <label for="user">Usuario</label>
                </div>
                <div class="input-field col s12">
                  <input name="email" id="email" type="text" class="validate">
                  <label for="user">Correo</label>
                </div>
                <div class="input-field col s6">
                  <input name="password" id="password" type="password" class="validate">
                  <label for="password">Contraseña</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input name="phone" id="phone" type="text" class="validate">
                  <label for="phone">Teléfono</label>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <select class="validate" name="role">
                    <option value="-1" selected>Tipo de Usuario</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                  </select>
                </div>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="col s3 offset-s2 center-align">
                    <button class="btn red accent-2" type="submit">
                        Enviar<i class="material-icons right">send</i>
                    </button>
                </div>
              </div>
            </form>
        </div>


@stop