<?php namespace Vistas;

?>
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
								<th width="10px">Sucursal</th>
								<th width="10px">Fecha</th>
								<th width="5px">Envio</th>
								<th width="30px">Domicilio</th>
								<th width="5px">FechaEnvio</th>
								<th width="5px">Horario</th>
								<th width="5px">Estado</th> 
							</tr>
						</thead>
						<tbody>
							<?php
							if(!empty($pedidos)){
								
								foreach ($pedidos as $pedido) {
									$idPedido 	= $pedido['idPedido'];
									$idSucursal = $pedido['idSucursal'];
									$fecha 		= $pedido['fecha'];
									$envio 		= $pedido['envio'];
									$domicilio 	= $pedido['domicilio'];
									$fechaEnvio = $pedido['fechaEnvio'];
									$horario  	= $pedido['rangoHs'];
									$estado 	= $pedido['estado'];

							?>
							<tr>
								<td><a href="<?php echo DIR . 'pedido/detallePedidoCli/' . $idPedido ;?>"><?php echo $idPedido?></td>
								<td><a href="<?php echo DIR . 'pedido/detalleSucursalCli/' . $idSucursal ;?>"><?php echo $idSucursal?></td>
								<td><?php echo $fecha?></td>
								<td><?php echo $envio?></td>
								<td><?php echo $domicilio?></td>
								<td><?php echo $fechaEnvio?></td>
								<td><?php echo $horario?></td>
								<td><?php echo $estado?></td>
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