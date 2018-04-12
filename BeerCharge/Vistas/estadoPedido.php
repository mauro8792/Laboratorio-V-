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
			    		<form role="form" method="POST" action="<?php echo DIR . 'pedido/modificarEstado'?>">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-offset-3">
			    					<div class="form-group" align="center">
			    						<label for="idPedido">Pedido</label>
			    						<input type="text" name="idPedido" id="idPedido" class="form-control input-sm floatlabel"  value="<?php echo $idPedido; ?>" disabled="true">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-offset-3">
			    					<div class="form-group" align="center">
			    						<label for="estado">Estado</label>
			    						<input type="text" name="estado" id="estado" class="form-control input-sm floatlabel"  value="<?php echo $estado; ?>" disabled="true">
			    					</div>
			    				</div>
			    			</div>
		    				<div class="row">
		    					<div class="col-xs-6 col-sm-6 col-md-offset-3">
		<?php if (isset($_SESSION['user'])){
                            if($_SESSION['rol']=='Administrador'){?>
                            		<div class="form-group" align="center">
				                		<label for="descripcion">Estados</label>
										<select name="cambioestado" id="cambioestado" class="form-control input-sm floatlabel">
										    <option value="Solicitado">Solicitado</option>
										    <option value="En Proceso">En Proceso</option>
										    <option value="Enviado">Enviado</option>
										    <option value="Finalizado">Finalizado</option>
										 </select>
									</div>
                            <?php }else{ ?>    						
		    						<div class="form-group" align="center">
				                		<label for="descripcion">Estados</label>
										<select name="cambioestado" id="cambioestado" class="form-control input-sm floatlabel">
										<?php if ($estado =='Solicitado'){?>
										   
										    <option value="En Proceso">En Proceso</option>
										    <option value="Enviado">Enviado</option>
										    <option value="Finalizado">Finalizado</option>
										<?php }else if($estado=='EnProceso'){?>    
											
										    <option value="Enviado">Enviado</option>
										    <option value="Finalizado">Finalizado</option>
										<?php }else if ($estado=='Enviado') { ?>
										<option value="Finalizado">Finalizado</option>
										<?php } ?>    
										 </select>
									</div>
								<?php }
								} ?>	
								</div>
	    					</div>
	    					<input type="hidden" id="pedido" name="pedido" value="<?php echo $idPedido?>">
			    			<input type="submit" class="btn btn-primary btn-block" value="Cambiar Estado" style="color: white" >
			    			<br>
			    			<a href="<?php echo DIR .'pedido/listarPedidos';?>">
			    				<input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver"></a>
			    		</form>
			     	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</section>


