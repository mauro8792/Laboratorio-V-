<?php namespace Vistas;
	if(!empty($message)){
		echo "<script type='text/javascript'>alert('$message');</script>";
	}

?>
<section style="margin-bottom: 50px">
	
		<div class="centered-form">
		    <div class="col-md-10" style="margin-left: 50px">
				<a href="<?php echo DIR . 'pedido/verPedido'?>" ><button class="btn btn-lg btn-primary" > 
					
					<span class='glyphicon glyphicon-shopping-cart'></span></button></a>
			</div>
		</div>
	
	</div>
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	
					<?php 
					foreach ($cervezas as $i) {
						
					?>
											
						<div class="col-md-4 col-md-offset-0">
		        	<div class="panel panel-default">
		        		<div class="panel-heading ">
			    			 <h2 style='font-size: 40px' align="center" class="panel-title"><b><?php echo $i['nombre'] ?></b></h2>
			 			</div>
						<div class="panel-body" style="text-align: center">
			    		<form role="form" method="POST"  action="<?php echo DIR . 'pedido/elegirEnvase'; ?>" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<img src="<?php echo DIR . $i['foto'] ; ?>" height='200'>
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="hidden" id="idCerveza" name="idCerveza" value="<?php echo $i['idCerveza']?>">
			    			<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Agregar al Pedido" height="50">
			    		</form>
			     	</div>
			    </div>
			</div>

					</form>
					<?php
						}
					?>
			   </div>
		    </div>
		</div>
</section>
