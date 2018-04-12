<?php namespace Vistas;

?>
<section>
	<div class="container">
        <div class="row centered-form">
        	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        		<div class="panel panel-default">
        			<div class="panel-heading">
			    		<h3  class="panel-title">Editar Cerveza <small></small></h3>
			 		</div>
			 		<div class="panel-body">
			    		<form role="form" method="POST" action="<?php echo DIR .'cerveza/editarCerveza';?>" enctype="multipart/form-data" meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="nombre">Nombre</label>
			    						<input type="text" name="nombre" id="nombre" class="form-control input-sm floatlabel" required=on value="<?php echo $cerv['nombre']; ?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="precioLitro">Precio Litro</label>
			    						<input type="number" name="precioLitro" id="precioLitro" min="0" class="form-control ut-sm" required="on" value="<?php echo $cerv['precioLitro'];?>">
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<label for="descripcion">Descripcion</label>
			    						<textarea name="descripcion" id="descripcion" class="form-control input-sm floatlabel" required=on rows="6" ><?php echo $cerv['descripcion']; ?></textarea>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="" align="center">
			    					<div class="form-group">
			    						<a href="javascript:CargarFoto('<?php echo DIR . $cerv['foto'] ; ?>','500','500')"><img src="<?php echo DIR . $cerv['foto'];?>" with='50' height='50'></a>
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
			    			<input type="hidden" name="foto" id="foto" value="<?php echo $cerv['foto'] ; ?>">
			    			<input type="hidden" name="idCerveza" id='idCerveza' value="<?php echo $cerv['idCerveza'] ?>">
			    			<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Guardar">
			    			<br>
			    			<a href="<?php echo DIR .'cerveza/listarCervezas';?>">
			    				<input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver"></a>
			    		</form>
			     	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</section>


