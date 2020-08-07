<?php

include '../config.php';
include '../db.php';
include '../session.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Práctica 09</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="contenedor">
        <?php include '../html_parts/session_control.php'; ?>
        <a href="../">Regresar</a>
        <h3>Practica 09: TODOs</h3>
        
        <div>
            <h4>Agregar ToDo</h4>
            <form class="login100-form validate-form" action="ajax/add_todo.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="usuario requerido">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text"  id="txtUsuario" name="usuario" type="text"  placeholder="ingrese usuario">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="name requerido">
						<span class="label-input100">name</span>
						<input class="input100" type="text"  id="txtUsuario" name="name" type="text"  placeholder="ingrese name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "email requerido">
						<span class="label-input100">email</span>
						<input class="input100" id="txtContrasena" name="email" type="email" placeholder="ingrese email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="password requerido">
						<span class="label-input100">password</span>
						<input class="input100" type="text"  id="txtUsuario" name="password" type="password"  placeholder="ingrese password">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Registrar"/>
					</div>
				</form>
        </div>

       

        <input type="button" id="btnLoadTodos" value="Cargar" />
        
        <!-- Div donde se va a cargar la tabla de ToDos -->
        <div id="divTodos"></div>

    </div>
    <script src="../js/jquery.js"></script>
    <script src="js/index.js?v=20180802-2"></script>
</body>
</html>
