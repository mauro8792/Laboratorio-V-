<?php namespace Vistas;
		

?>
<section>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3  class="panel-title">Ingresar Cerveza <small></small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="POST" action="nueva" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
				    				<div class="form-group">
				    						<label for="nombre">Nombre</label>
				    						<input type="text" name="nombre" id="nombre" class="form-control input-sm floatlabel" required=on placeholder="Nombre" width="40" >
				    				</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="precioLitro">Precio Litro</label>
			    						<input type="number" name="precioLitro" id="precioLitro"  class="form-control ut-sm" required="on" placeholder="Precio x Lt">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<label for="descripcion">Descripcion</label>
			    						<textarea name="descripcion" id="descripcion" class="form-control input-sm floatlabel" required=on placeholder="Descripcion" rows="6"> </textarea>
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
			    			<input type="submit" class="btn btn-primary btn-block" style="color: white">
			    		</form>
			     	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</section>
