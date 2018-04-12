<?php namespace Vistas;


?>
<div class="container">
	<img id="estirada" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%" src="/BeerCharge/Vistas/images/ladrilloOscuro.jpg" />
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Mis Datos <small></small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="POST" action="../login/updateDatos">
			    			<?php foreach ($cuenta as $i) { ?>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="nombre" id="nombre" class="form-control input-sm floatlabel" required="on" value='<?php echo $i['nombre']; ?>'>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="apellido" id="apellido" class="form-control input-sm" required="on" value='<?php echo $i['apellido']; ?>'>
			    					</div>
			    				</div>
			    			</div>

			    			
			    			<div class="form-group">
			                		<input type="text" name="direccion" id="direccion" class="form-control input-sm floatlabel" required="on" value='<?php echo $i['direccion']; ?>'>
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="localidad" id="localidad" class="form-control input-sm" required="on" value='<?php echo $i['localidad']; ?>'>
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="provincia" id="provincia" class="form-control input-sm" required="on" value='<?php echo $i['provincia']; ?>'>
			    			</div>
			    				
			    				
			    			<div class="form-group">
			    				<input type="number" name="telefono" id="telefono" class="form-control input-sm" required="on" value='<?php echo $i['telefono']; ?>'>
			    			</div>
			    				
			    			
			    			

			    			

			    			
			    			

			    			<input type="hidden" name="email" id="email" value="<?php echo $i['email']; ?>">



			    			<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $i['idUsuario']; ?>">

			    			<input type="submit" class="btn btn-success btn-block" style="color: white" value='Guardar'>
			    			<?php } ?>
			    		</form>
			    		<br>
			    		<div align="center">
			    			<a href="index" class="btn btn-success btn-block" style="color: white">Volver</a>
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

