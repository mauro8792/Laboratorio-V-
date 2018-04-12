<?php namespace Vistas;
	
	


?>



<section>
	<div class="container">
		<div class="row centered-form">
	        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
	        	<div class="panel panel-default">
	        		<div class="panel-heading">
				    	<h3 class="panel-title"> Envio <small></small></h3>
				 	</div>
			 		<div class="panel-body">
			    		<form role="form" method="POST" action="<?php echo DIR .'pedido/envioPedido'?>">
			    			<div class="col-xs-6 col-sm-6 col-md-12">
			    				<div class="form-group">
			    					<label>Domicilio</label>
		                			<input type="text" name="domicilio" id="domicilio" class="form-control input-sm floatlabel" required="on" value="<?php echo $cliente[0]['direccion']?>">
		    					</div>
			    			</div>
			    			<div class="col-xs-6 col-sm-6 col-md-12">
				    			<div class="form-group">
				    				<label>Localidad</label>
				    				<input type="text" name="localidad" id="localidad" class="form-control input-sm floatlabel" required="on" value="<?php echo $cliente[0]['localidad']?>">
				    			</div>
			    			</div>

			    			<div class="col-xs-6 col-sm-6 col-md-12">
			    				<div class="form-group">
			    					<label>Provincia</label>
			    					<input type="text" name="provincia" id="provincia" class="form-control input-sm floatlabel" required="on" value="<?php echo $cliente[0]['provincia']?>">
			    				</div>
			    			</div>
			    			
			    			<div class="col-xs-6 col-sm-6 col-md-12">		
				    			<div class="form-group">
				    				<label>Fecha Envio</label>
				    				<input type="date" name="fechaEnvio" id="fechaEnvio" class="form-control input-sm floatlabel" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required="on"  >
				    			</div>
				    		</div>

				    		<div class="col-xs-6 col-sm-6 col-md-12">
				    			<div class="form-group">
			                		<label for="descripcion">Rango Horario</label>
									<select name="rangoHs" id="rangoHs" class="form-control input-sm floatlabel">
		                				<option value="12:00-14:00">12:00-14:00</option>
		                				<option value="16:00-18:00">16:00-18:00</option>
		                				<option value="18:00-20:00">18:00-20:00</option>
									 </select>
		    					</div>
		    				</div>
			    			<br>
			    			<div class="col-xs-6 col-sm-6 col-md-12">	
			    				<input type="submit" class="btn btn-success btn-block" style="color: white" value="Continuar">
			    				<br>
			    				<a href="<?php echo DIR .'pedido/verPedido';?>">
			    				<input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver"></a>
			    			</div>
			    		</form>
			    		<br>
				    	</div>
		    		</div>
	    		</div>
	    	</div>
	    </div>
</section>


<script type="text/javascript">
	document.getElementById('#fecha').value = new Date(). .toDateInputValue();
</script>

