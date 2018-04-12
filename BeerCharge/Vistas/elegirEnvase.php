<?php namespace Vistas;
	
?>

<section>
<div class="container">
        <div class="row centered-form">
	        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
	        	<div class="panel panel-default">
	        		<div class="panel-heading">
				    		<h3  class="panel-title">Seleccione Envase <small></small></h3>
				 	</div>
				 	<div class="panel-body">
			    		<form role="form" method="POST" action="<?php echo DIR . 'pedido/agregarAlCarrito';?>" enctype="multipart/form-data">
			    			<div class="row" >
			    				<div class="col-md-10 col-md-offset-2 " >
				    				<div class="form-group">
										<input style="text-align: center" type="text" name="Cerveza" disabled="true" value="<?php echo $cerv['nombre'];?>" >
									</div>
								</div>
			    				<div class="col-md-7 col-md-offset-2 " >
				    				<div class="form-group" >
				    					<label>Envase</label>
										<select name="envase" id="envase" class="form-control input-sm floatlabel">
											<?php  
												foreach ($envaseCerv as $i) {?>
													<option value="<?php echo $i["idEnvase"]; ?>"><?php echo $i['descripcion']; ?></option>

					    					<?php
											} 
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4 col-md-offset-2 " >
				    				<div class="form-group">
				    					<label >Cantidad</label>
										<input type="number" min="0" name="cantidad" id="cantidad" required="" minlength="1" value="1">
									</div>
								</div>
							</div>
							<input type="hidden" name="idCerveza" id="idCerveza" value="<?php echo $idCerveza?>">
							<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Agregar al Carrito" height="50">	
							<br>
							<a href="<?php echo DIR .'pedido/elegirCerveza';?>">
			    				<input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver"></a>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
</section>












