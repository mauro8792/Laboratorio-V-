<!DOCTYPE html>
<html>
<head>
	<title>Registrar</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
<div class="container">
	<h1 class="text-center titulo">Agregar Usuario</h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form method="POST" action="procesar.php">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" class="form-control" id="apellido" placeholder="apellido" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="dni">Dni</label>
					<input type="text" name="dni" class="form-control" id="dni" placeholder="dni" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" id="email" placeholder="email" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="text" name="password" class="form-control" id="password" placeholder="password" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="fechaAlta">Fecha Alta</label>
					<input type="text" name="fechaAlta" class="form-control" id="fechaAlta" placeholder="fechaAlta" autocomplete="off">
				</div>
				<button type="submit" class="btn btn-info" value="insertar" name="btnInsertar">Insertar</button>
                <button type="submit" class="btn btn-info" value="eliminar" name="btnEliminar">Eliminar</button>
                <button type="submit" class="btn btn-info" value= "modificar" name="btnModificar">Modificar</button>
                <button type="submit" class="btn btn-info" value= "listar" name="btnListar">Listar</button>
				
			</form>
		</div>
	</div>
</div>
</body>
</html>