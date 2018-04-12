<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
	<div class="container">
      	<div class="row centered-form">
			<div class="col-md-10 col-md-offset-1">
			  	<div class="panel panel-default">
			    	<div class="panel-heading">
				   		<h3 class="panel-title">Detalle Pedido: <?php echo $idPedido ?> <small></small></h3>
				 	</div>
					<table class="table table-inverse"  border="1" style="text-align: center">
						<thead>
							<tr>
								<th width="5px">Linea</th>
								<th width="5px">Cerveza</th>
								<th width="10px">Envase</th>
								<th width="5px">Precio Envase</th>
								<th width="30px">Cantidad</th>
								<th width="5px">Precio Ln</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$totalPedido = 0;
							if(!empty($pedido)){
								
								foreach ($pedido as $linea) {
									$idLn = $linea['idLineaPedido'];
									$cerveza = $linea['idCerveza'];
									$envase = $linea['idEnvase'];
									$precioxenvase= $linea['precioxEnv'];
									$cantidad = $linea['cantidad'];
									$precioLn = $linea['precioLinea'];
									$totalPedido = $totalPedido + $precioLn;

									foreach ($cervezas as $i[0]) {
										if($i[0]['idCerveza']== $cerveza){
											$nombreCerv = $i[0]['nombre'];
										}
									}

									foreach ($envases as $e[0]) {
										if($e[0]['idEnvase']== $envase){
											$nombreEnv = $e[0]['descripcion'];
										}
									}
							?>
							<tr>
								<td><?php echo $idLn?></td>
								<td><?php echo $nombreCerv?></td>
								<td><?php echo $nombreEnv?></td>
								<td><?php echo '$'.$precioxenvase?></td>
								<td><?php echo $cantidad ?></td>
								<td><?php echo '$'.$precioLn?></td>
							</tr>
							
							<?php
							   }
							}

							?>
							<tr>
								<td colspan="5" align="right" style="font-size: 20px;color: black;">TOTAL</td>
								<td style="font-size: 20px; color: green"><?php echo '$'.$totalPedido?></td>
							</tr>
						</tbody>
					</table>
					<div class="row centered-form col-md-2 col-md-offset-5">
    					<a href="<?php echo DIR . 'pedido/pedidosCliente/'.$_SESSION['user'];?>"><input type="button" class="btn btn-primary btn-block" style="color: white" value="Volver"></a>
					</div>
				</div>
			</div>
		</div>
	</div> 
	  						
</section>	