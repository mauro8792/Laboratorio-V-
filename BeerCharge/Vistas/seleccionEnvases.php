<?php namespace Vistas;

?>
<section>
	<div class="container">
        <div class="row centered-form">
        	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        		<div class="panel panel-default">
        			<div class="panel-heading">
			    		<h3  class="panel-title">Selecciona Envase <small></small></h3>
			 		</div>
			 		<div class="panel-body">
			    		<form role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="nombre">Nombre</label>
			    						<input type="text" name="nombre" id="nombre" class="form-control input-sm floatlabel" required=on value="<?php echo $cervUltima['nombre']; ?>" disabled="true">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="precioLitro">Precio Litro</label>
			    						<input type="number" name="precioLitro" id="precioLitro"  class="form-control ut-sm" required="on" value="<?php echo $cervUltima['precioLitro'];?>" disabled="true">
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<label for="descripcion">Descripcion</label>
			    						<textarea name="descripcion" id="descripcion" class="form-control input-sm floatlabel" required=on  disabled="true" rows="6" ><?php echo $cervUltima['descripcion']; ?></textarea>
			    					</div>
			    				</div>
			    			</div>
			    		</form>
			    		<form role='form' method="POST" action="<?php echo DIR .'cerveza/agregaEnvases';?>" enctype="multipart/form-data">

		    				<div class="form-group">
		                		<label for="descripcion">Envase</label>
								<select name="envase" id="envase" class="form-control input-sm floatlabel">
	                				<?php  foreach ($envases as $i) {?>
	                				
								    <option value="<?php echo $i["idEnvase"] ?>"><?php echo $i['descripcion']; ?></option><?php } ?>    
								 </select>
	    					</div>

			    			<input type="hidden" name="idCerveza" id='idCerveza' value="<?php echo $cervUltima['idCerveza'] ?>">
			    			<input type="submit" class="btn btn-primary btn-block" value="Agregar" style="color: white">
			    			<br>
			    			<a href="<?php echo DIR .'cerveza/ingresarCerveza';?>"><input type="button" value="Finalizar" class="btn btn-danger btn-block" style="color: white" name="Finalizar"></a>
			    		</form>
			     	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</section>


