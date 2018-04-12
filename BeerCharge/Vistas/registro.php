<?php namespace Vistas;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BeerCharge</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href= "/BeerCharge/Vistas/css/bootstrap.min.css" rel="stylesheet">
  <link href= "/BeerCharge/Vistas/images/favicon.png" rel='shortcut icon' type='image/png'/>
  <script src="/BeerCharge/Vistas/js/jquery.js"></script>
  <script src="/BeerCharge/Vistas/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body{
  /* Safari 4-5, Chrome 1-9 */
    
}



.centered-form{
  margin-top: 100px;
}

.centered-form .panel{
  background: rgba(255, 255, 255, 0.8);
  box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}

label.label-floatlabel {
    font-weight: bold;
    color: #46b8da;
    font-size: 11px;
}

</style>

<body>
<div class="container">
	<img id="estirada" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%" src="/BeerCharge/Vistas/images/ladrilloOscuro.jpg" />
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Registrarse <small></small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="POST" action="../login/registrar">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="nombre" id="nombre" class="form-control input-sm floatlabel" required="on" placeholder="Nombre">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="apellido" id="apellido" class="form-control input-sm" required="on" placeholder="Apellido">
			    					</div>
			    				</div>
			    			</div>

			    			
			    			<div class="form-group">
			                		<input type="text" name="direccion" id="direccion" class="form-control input-sm floatlabel" required="on" placeholder="Direccion">
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="localidad" id="localidad" class="form-control input-sm" required="on" placeholder="Localidad">
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="provincia" id="provincia" class="form-control input-sm" required="on" placeholder="Provincia">
			    			</div>
			    				
			    				
			    			<div class="form-group">
			    				<input type="text" name="telefono" id="telefono" class="form-control input-sm" required="on" placeholder="Telefono">
			    			</div>
			    				
			    			
			    			

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" required="on" placeholder="Email">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" required="on" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password2" id="password2" class="form-control input-sm" required="on" placeholder="Confirmar Password">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" class="btn btn-success btn-block" style="color: white">
			    		</form>
			    		<br>
			    		<div align="center">
			    			<a href="vistaLogin">Ingresar</a>
			    		</div>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>

    <script type="text/javascript">
	$(function() {
  $('input').floatlabel({labelEndTop:0});
});</script>

</body>


</html>