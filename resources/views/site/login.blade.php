@extends('layout')

@section('content')
	<nav>
	  <div class="nav-wrapper">
	    <a class="brand-logo" style="margin-left: 15px">Inicio de sesión</a>
	  </div>
	</nav>
	<div class="row" style="margin-top: 100px">
	    <form class="col s12" action="/site/verify" method="post">
	      <div class="row">
	        <div class="input-field col s3 offset-s4">
	          <input id="user" type="text" class="validate" name="username">
	          <label for="user">Usuario</label>
	        </div>
	      </div>
	      <div class="row">
	        <div class="input-field col s3 offset-s4">
	          <input id="password" type="password" class="validate" name="password">
	          <label for="password">Contraseña</label>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col s3 offset-s4 center-align">
	            <button class="btn red accent-2" type="submit" name="action">
	                Enviar<i class="material-icons right">send</i>
	            </button>
	        </div>
	      </div>
	      <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    </form>
	</div>
@stop
