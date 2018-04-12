<?php namespace Vistas;


?>
<section style="margin-bottom: 50px">
	</div>
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-12 col-md-offset-0">
		        	
					<?php 
					foreach ($cervezas as $i) {
						
					?>					
						<div class="col-md-10 col-md-offset-1">
		        			<div class="panel panel-default">
		        		<div class="panel-heading ">
			    			 <h2 style='font-size: 40px' align="center" class="panel-title"><b><?php echo $i['nombre']?></b></h2>
			 			</div>
						<div class="panel-body" style="text-align: center">
			    		<form role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-2 col-md-offset-0">
			    					<div class="form-group">
			    						<img src="<?php echo DIR . $i['foto'] ; ?>" height='250' >
			    					</div>
			    				</div>
			    				<br></br>
			    				<div class="col-xs-6 col-sm-6 col-md-8 col-md-offset-1">
			    					<div class="form-group">
			    						<h2 style='font-size: 35px' align="left" class="panel-title"><b><?php echo $i['descripcion']?></b></h2>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<h2><a href="<?php echo DIR .'cerveza/listarEnvCli/';?><?php echo $i['idCerveza']; ?>">Envases Disponibles</a></h2>
			    						<br>
			    						<h2 style='font-size: 35px' align="center" class="panel-title"><b><?php echo '$ ' . $i['precioLitro']?></b></h2>
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
