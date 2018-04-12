<?php namespace Vistas;
	if(!empty($message)){
		echo "<script type='text/javascript'>alert('$message');</script>";
	}

?>
<section style="margin-bottom: 50px">
	
	</div>
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	
					<?php 
					foreach ($sucursales as $i) {
						
					?>
											
						<div class="col-md-4 col-md-offset-0">
		        	<div class="panel panel-default">
		        		<div class="panel-heading ">
			    			 <h2 style='font-size: 40px' align="center" class="panel-title"><b><?php echo $i['direccion']. '<br>'. $i['localidad']. ',' . $i['provincia'] ?></b></h2>
			 			</div>
						<div class="panel-body" style="text-align: center">
			    		<form role="form" method="POST"  action="<?php echo DIR . 'pedido/retiroPedido'; ?>" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    							
								 		<a href="<?php echo  $i['ubicacion'] ; ?> " target='_blank'>	
								 		<img src="<?php echo DIR . $i['foto'] ; ?> " width='200' ></a>
								 		<br>
								 		<h2 style=><?php echo  'Tel: ' . $i['telefono']?> </h2>
									
										<input type="hidden" name="idSucursal" value='<?php echo $i['idSucursal']; ?>'>
			    					</div>
			    				</div>
			    			</div>

			    			<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Aquí" height="50">
			    		
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
