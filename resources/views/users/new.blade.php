@extends('layout')

@section('content')
   <div class="row " style="margin-top: 50px">
            <form class="col s8 offset-s3">
              <div class="row">
                <div class="input-field col s4">
                  <input id="name" type="text" class="validate">
                  <label for="name">Nombre</label>
                </div>
                <div class="input-field col s4">
                  <input id="lastsname" type="text" class="validate">
                  <label for="lastname">Apellido</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s4">
                  <input id="user" type="text" class="validate">
                  <label for="user">Usuario</label>
                </div>
                <div class="input-field col s4">
                  <input id="password" type="password" class="validate">
                  <label for="password">Contraseña</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="phone" type="password" class="validate">
                  <label for="phone">Teléfono</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <select>
                    <option value="" disabled selected>Tipo de Usuario</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col s3 offset-s2 center-align">
                    <button class="btn red accent-2" type="submit" name="action">
                        Enviar<i class="material-icons right">send</i>
                    </button>
                </div>
              </div>
            </form>
        </div>


@stop