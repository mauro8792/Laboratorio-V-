<?php namespace Vistas;


?>
<section style="margin-bottom: 50px">
	</div>
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	
					<?php 
					foreach ($sucursales as $i) {
						
					?>					
						<div class="col-md-6">
		        			<div class="panel panel-default">
		        		<div class="panel-heading ">
			    			 <h2 style='font-size: 40px' align="center" class="panel-title"><b><?php echo $i['direccion']. '<br>' . $i['localidad'].','.$i['provincia']?></b></h2>
			 			</div>
						<div class="panel-body" style="text-align: center">
			    		<form role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<a target="_blank" href="<?php echo $i['ubicacion']?>"><img src="<?php echo DIR . $i['foto'] ; ?>"   height='200' ></a>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<h2 style='font-size: 25px' align="center" class="panel-title"><b><?php echo "Tel: " . $i['telefono']?></b></h2>
			    					</div>
			    				</div>
			    			</div>
			    						    			
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
