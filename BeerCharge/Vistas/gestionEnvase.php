<?php namespace Vistas;
		

?>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Ingresar <small></small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="POST" action="nuevoEnvase" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="descripcion" id="descripcion" class="form-control input-sm floatlabel" required=on placeholder="Descripcion">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="number" name="litros" id="litros"  class="form-control ut-sm" required="on" placeholder="litros" min="0.001" step="0.001">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="number" name="coeficiente" id="coeficiente"  class="form-control ut-sm" required="on" placeholder="coeficiente" min="0.001" step="0.001">
			    					</div>
			    				</div>
			    				
			    			</div>
			    			<div class="row">
			    					<div class="col-xs-6 col-sm-6 col-md-6">
				    					<div class="form-group">
				    						<input type="file" name="fileToUpload" id="fileToUpload"  >
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
