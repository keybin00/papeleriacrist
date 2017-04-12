<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
</head>
<body>
		<?php if (Route::getCurrentRoute()->getActionName() !== 'App\Http\Controllers\SiteController@login'): ?>
			<nav>
			  <div class="nav-wrapper dark-primary-color">
			    <a href="/site/index" class="brand-logo" style="margin-left: 15px">keyBin</a>
			    <ul class="right hide-on-med-and-down">
			        <li><a href="/users/new">Usuarios</a></li>
			        <li><a href="#">Inventario</a></li>
			        <li><a href="#">Compras</a></li>
			        <li><a href="#">Ventas</a></li>
			    </ul>
			  </div>
			</nav>
		<?php endif ?>
		
		@yield('content')

	<script src="/js/app.js"></script>
	<script src="https://use.fontawesome.com/fafb7367a1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

</body>
</html>