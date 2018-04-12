<?php namespace Vistas;
		

?>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Ingresar Sucursal <small></small></h3>
			 	</div>
			 			<div class="panel-body">
				    		<form role="form" method="POST" action="nuevaSucursal" enctype="multipart/form-data">
				    			<div class="row">
				    				<div class="col-xs-6 col-sm-6 col-md-6">
				    					<div class="form-group">
				    						<input type="text" name="direccion" id="direccion" class="form-control input-sm floatlabel" required=on placeholder="direccion">
				    					</div>
				    				</div>
				    				<div class="col-xs-6 col-sm-6 col-md-6">
				    					<div class="form-group">
				    						<input type="text" name="telefono" id="telefono"  class="form-control ut-sm" required="on" placeholder="telefono">
				    					</div>
				    				</div>
				    				<div class="col-xs-6 col-sm-6 col-md-6">
				    					<div class="form-group">
				    						<input type="text" name="localidad" id="localidad"  class="form-control ut-sm" required="on" placeholder="localidad">
				    					</div>
				    				</div>
					    			<div class="col-xs-6 col-sm-6 col-md-6">
					    				<div class="form-group">
					    						<input type="text" name="provincia" id="provincia"  class="form-control ut-sm" required="on" placeholder="provincia">
					    				</div>
					    			</div>
					    			<div class="col-xs-10 col-sm-10 col-md-10">
						    			<div class="form-group">
				    						<input type="text" name="ubicacion" id="ubicacion" class="form-control input-sm" required="on" placeholder="Ubicación">
				    					</div>
				    				</div>	
				    				<br>
					    			<div class="col-xs-6 col-sm-6 col-md-6">
					    					<div class="form-group">
					    						<input type="file" name="fileToUpload" id="fileToUpload" class=" ut-sm">
					    					</div>
				    				</div>
				    				
				    			</div>

				    			
				    			<input type="submit" class="btn btn-info btn-block" value="Guardar">
				    		</form>
			    		<br>
			    		
			    	    </div>
	    	</div>
        </div>
    </div>
</div>
