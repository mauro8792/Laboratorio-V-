<?php namespace Vistas;

?>
<section>
	<div class="container">
        <div class="row centered-form">
        	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        		<div class="panel panel-default">
        			<div class="panel-heading">
			    		<h3  class="panel-title">Editar Sucursal <small></small></h3>
			 		</div>
			 		<div class="panel-body">
			    		<form role="form" method="POST" action="<?php echo DIR .'sucursal/editarSucursal';?>" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="direccion">Direccion</label>
			    						<input type="text" name="direccion" id="direccion" class="form-control input-sm floatlabel" required=on value="<?php echo $local['direccion']; ?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="telefono">Telefono</label>
			    						<input type="text" name="telefono" id="telefono"  class="form-control ut-sm" required="on" value="<?php echo $local['telefono'];?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="localidad">Localidad</label>
			    						<input type="text" name="localidad" id="localidad"  class="form-control ut-sm" required="on" value="<?php echo $local['localidad'];?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="provincia">Provincia</label>
			    						<input type="text" name="provincia" id="provincia"  class="form-control ut-sm" required="on" value="<?php echo $local['provincia'];?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-10 col-sm-10 col-md-10">
			    					<div class="form-group">
			    						<label for="ubicacion">Ubicacion</label>
			    						<input type="text"  name="text" id="ubicacion"  class="form-control ut-sm" required="on" value="<?php echo $local['ubicacion'];?>">
			    					</div>
			    				</div>
			    				
				    			<div class="" align="center">
				    					<div class="form-group">
				    						<a href="javascript:CargarFoto('<?php echo DIR . $local['foto'] ; ?>','500','500')"><img src="<?php echo DIR . $local['foto'];?>" with='50' height='50'></a>
				    					</div>
				    			</div>
				    			<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="file" name="fileToUpload" id="fileToUpload" >
			    					</div>
			    				</div>
			    				
			    				
			    			</div>
			    			
			    			<input type="hidden" name="foto" id="foto" value="<?php echo $local['foto'] ; ?>">
			    			<input type="hidden" name="idSucursal" id='idSucursal' value="<?php echo $local['idSucursal'] ?>">
			    			<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Guardar">
			    			<br>
			    			<a href="<?php echo DIR .'sucursal/listarSucursales';?>">
			    				<input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver"></a>
			    		</form>
			     	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</section>
