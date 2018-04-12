<?php namespace Vistas;
 var_dump($_SESSION['rol']);

?>
<section>
	<div class="container">
      	<div class="row centered-form">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
			    	
					<form  method="POST" action="<?php echo DIR .'pedido/listarPedidosFiltro'; ?>">
						<div class="row">
			    			<div class="col-md-2" style="margin-left: 60px">
			    				<br>
			    				<div class="form-group">
									<label>Fecha</label>
									<input type="date" style="width: 140px" name="fechaPed" id="fechaPed">
									<br><br>
			    				</div>
			    			</div>
			    			<br>
			    			<div class="col-md-2" style="margin-left: 20px">
			    				<div class="form-group">
									<label>Cliente</label>
									<input type="text" style="width: 180px" name="clienteNom" id="clienteNom">
									<br><br>
			   					</div>
			   				</div>
			    			<div class="col-md-2" style="margin-left: 70px">
			    				<div class="form-group">
									<label for="sucursal">Sucursal</label>
									<select name="idSucursal" id="idSucursal" style="height: 25px; width: 250px">
										<option value=""></option>
										<?php foreach ($sucursales as $i) {?>
									
									  		<option value="<?php echo $i['idSucursal']?>"><?php echo '['.$i['idSucursal'].'] - '.$i['direccion']?></option>
									  	<?php }?>
									</select>
			   					</div>
			   				</div>
			   				<br>
			   				<div class="col-md-2" style="margin-left: 150px">
			    				<div class="form-group">
									<input type="submit" class="btn btn-primary btn-block" value="Aplicar" style="width: 100px">
			   					</div>
			   				</div>
			   			</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section style="margin-bottom: 50px">
	<div class="container">
      	<div class="row centered-form">
			<div class="col-md-12 col-md-offset-0">
			  	<div class="panel panel-default">
			    	<div class="panel-heading">
				   		<h3 class="panel-title">Pedidos <small></small></h3>
				 	</div>
					<table class="table table-inverse"  border="1" style="text-align: center">
						<thead>
							<tr>
								<th width="5px">Pedido</th>
								<th width="5px">Cliente</th>
								<th width="10px">Sucursal</th>
								<th width="10px">Fecha</th>
								<th width="5px">Envio</th>
								<th width="30px">Domicilio</th>
								<th width="5px">FechaEnvio</th>
								<th width="5px">Horario</th>
								<th width="5px">Estado</th> 
								<th width="5px"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(!empty($pedidos)){
								
								foreach ($pedidos as $pedido) {
									$idPedido 	= $pedido['idPedido'];
									$idCliente 	= $pedido['idCliente'];
									$idSucursal = $pedido['idSucursal'];
									$fecha 		= $pedido['fecha'];
									$envio 		= $pedido['envio'];
									$domicilio 	= $pedido['domicilio'];
									$fechaEnvio = $pedido['fechaEnvio'];
									$horario  	= $pedido['rangoHs'];
									$estado 	= $pedido['estado'];

									
									foreach ($clientes as $s[0]) {
										if($s[0]['idUsuario']== $idCliente){
											$apellido = $s[0]['apellido'];
											$nombre = $s[0]['nombre'];
											$cliente = $apellido.','.$nombre;
									}
								}
									

							?>
							<tr <?php if($estado=='Finalizado'){?> style="background-color: rgb(6,52,64); color: white ; " <?php } ?>>
								<td><a href="<?php echo DIR . 'pedido/detallePedido/' . $idPedido ;?>"><?php echo $idPedido?></td></a>
								<td><a href="<?php echo DIR . 'pedido/detalleCliente/' . $idCliente ;?>"><?php echo $cliente?></td></a>
								<td><a href="<?php echo DIR . 'pedido/detalleSucursal/' . $idSucursal ;?>"><?php echo $idSucursal?></td></a>
								<td><?php echo $fecha?></td>
								<td><?php echo $envio?></td>
								<td><?php echo $domicilio?></td>
								<td><?php echo $fechaEnvio?></td>
								<td><?php echo $horario?></td>
								<td><b><?php echo $estado?></b></td>
				<?php if (isset($_SESSION['user'])){
                            if($_SESSION['rol']!='Empleado'){?>				
								<td align="center">
									<?php if (($estado=='Finalizado') || $estado!='Finalizado') { ?>
									<a href="<?php echo DIR . 'pedido/estadoPedido/' . $idPedido.'/'.$estado ; ?>"  class="btn btn-success btn-block" style="color: white" role="button"><?php if ($estado!='Finalizado') { echo $estado;} else {echo "✓";} ?> </a>
									<?php } else { ?> 
									<a   class="btn btn-success btn-block" style="color: white" role="button"><?php if ($estado!='Finalizado') { echo $estado;} else {echo "✓";} ?> </a>
									<?php }  ?> 
								</td>


								<?php } else { ?>
								<td align="center">
									<?php if ($estado!='Finalizado') { ?>
									<a href="<?php echo DIR . 'pedido/estadoPedido/' . $idPedido.'/'.$estado ; ?>"  class="btn btn-success btn-block" style="color: white" role="button"><?php if ($estado!='Finalizado') { echo $estado;} else {echo "✓";} ?> </a>
									<?php } else { ?> 
									<a   class="btn btn-success btn-block" style="color: white" role="button"><?php if ($estado!='Finalizado') { echo $estado;} else {echo "✓";} ?> </a>
									<?php }  ?> 
								</td>
								<?php }
								} ?>	

							</tr>
							<?php
							   }
							   	}

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>   						
</section>	

