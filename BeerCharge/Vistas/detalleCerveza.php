<?php namespace Vistas;

?>
<section style="margin-bottom: 50px;">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-3">
		        	<div class="panel panel-default">
						<div class="panel-body" style="text-align: center">
			    		<form role="form" method="POST" action="<?php echo DIR .'cerveza/editarCerveza';?>" enctype="multipart/form-data">
			    			<div class="row"">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<h3><b><?php echo $cerveza['nombre'] ?></b></h3>
			    					</div>
			    				</div>
			    				<br>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<img src="<?php echo DIR . $cerveza['foto'] ; ?>" height='200'>
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" class="btn btn-primary btn-block" value="volver" style="color: white">
			    		</form>
			     	</div>
			    </div>
			</div>
		</div>
	</div>
</section>

				

