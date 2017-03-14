<?php 
  session_start();
  //connect.php
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'keybin';
  if(!mysql_connect('localhost', 'root', '')){
    exit('Error: could not establish database connection');
  }
  if(!mysql_select_db($database)){
    exit('Error: could not select the database');
  }
?>
<html>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
        <script src="https://use.fontawesome.com/fafb7367a1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>

    <body>
        <nav>
          <div class="nav-wrapper dark-primary-color">
            <a class="brand-logo" style="margin-left: 15px">keyBin</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="usuarios.php">Usuarios</a></li>
                <li><a href="inventario.php">Inventario</a></li>
                <li><a href="compras.html">Compras</a></li>
                <li><a href="ventas.html">Ventas</a></li>
            </ul>
          </div>
        </nav>
        <div class="row">
          <div class="col s1 offset-s11 " style="margin-top: 20px">
            <a class="btn-floating red accent-2" href="register.html"><i class="material-icons">add</i></a>
          </div>
        </div>
        <div class="row">
          <div class="col s8 offset-s2 center-align ">
            <?php
              $query = mysql_query("SELECT user,name,lastname FROM users");
              while($rowtwo = mysql_fetch_array($query)){
                echo '
                  <div class="col s6 center-align">
                    <div class="card #e57373 red lighten-2">
                      <div class="card-content white-text">
                        <span class="card-title">' .$rowtwo['name'].' ' .$rowtwo['lastname'].'</span>
                        <p>Usuario: ' .$rowtwo['user'].'</p>
                      </div>
                      <div class="card-action #ffebee red lighten-5">
                        <a class="btn-floating red accent-2" href=""><i class="material-icons">mode_edit</i></a>
                        <a class="btn-floating red accent-2" href=""><i class="material-icons">delete</i></a>
                      </div>
                    </div>
                  </div>
                '
                ;
              }
              echo '</table>';
            ?>
          </div>
      </div>

    </body>
</html>