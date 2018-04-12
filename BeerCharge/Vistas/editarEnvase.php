<?php namespace Vistas;

?>
<section>
	<div class="container">
        <div class="row centered-form">
        	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        		<div class="panel panel-default">
        			<div class="panel-heading">
			    		<h3  class="panel-title">Editar Envases <small></small></h3>
			 		</div>
			 		<div class="panel-body">
			    		<form role="form" method="POST" action="<?php echo DIR .'envase/editarEnvase';?>" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="descripcion">Descripcion</label>
			    						<input type="text" name="descripcion" id="descripcion" class="form-control input-sm floatlabel" required=on value="<?php echo $recipiente['descripcion']; ?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="litros">Litros</label>
			    						<input type="number" step="any" min="0" name="litros" id="litros"  class="form-control ut-sm" required="on" value="<?php echo $recipiente['litros'];?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="coeficiente">Coeficiente</label>
			    						<input type="number" step="any"  min="0" max="1" name="coeficiente" id="coeficiente"  class="form-control ut-sm" required="on" value="<?php echo $recipiente['coeficiente'];?>">
			    					</div>
			    				</div>
			    			<div class="row">
			    				<div class="" align="center">
			    					<div class="form-group">
			    						<a href="javascript:CargarFoto('<?php echo DIR . $recipiente['foto'] ; ?>','500','500')"><img src="<?php echo DIR . $recipiente['foto'];?>" with='50' height='50'></a>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="file" name="fileToUpload" id="fileToUpload" >
			    					</div>
			    				</div>
			    			</div>
			    				
			    				
			    				
			    			</div>
			    			<input type="hidden" name="foto" id="foto" value="<?php echo $recipiente['foto'] ; ?>">
			    			<input type="hidden" name="idEnvase" id='idEnvase' value="<?php echo $recipiente['idEnvase'] ?>">
			    			<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Guardar">
			    			<br>
			    			<a href="<?php echo DIR .'envase/listarEnvases';?>">
			    				<input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver"></a>
			    		</form>
			     	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</section>