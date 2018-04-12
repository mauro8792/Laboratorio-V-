<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
	<div class="container">
      	<div class="row centered-form">
			<div class="col-md-10 col-md-offset-1">
			  	<div class="panel panel-default">
			    	<div class="panel-heading">
				   		<h3 class="panel-title">Pedido <small></small></h3>
				 	</div>
					<table class="table table-inverse"  border="1">
						<thead>
							<tr>
								<th width="10px">LineaPedido</th>
								<th width="100px">Cerveza</th>
								<th width="35px">Envase</th>
								<th width="90px">Precio Lt</th>
								<th width="5px">Cantidad</th>
								<th width="5px">Precio Linea</th>
								<th width="5px"></th> 
							</tr>
						</thead>
						<tbody>
							<?php
							$totalPedido = 0;
							if(!empty($lnPedido)){
								
								foreach ($lnPedido as $lineas) {
									$linea = $lineas->listar();

									$idLn = $linea->getIdLineaPedido();
									$cerveza = $linea->devolverCerveza();
									$envase = $linea->devolverEnvase();
									$precioxenvase=$linea->getPrecioXenvase();
									$idCerveza = $cerveza[0]["idCerveza"];
									$nombreCerveza = $cerveza[0]["nombre"];
									$nombreEnvase  = $envase[0]['descripcion'];
									
									
									$cantidad = $linea->getCantidad();
									$precioLn = $linea->getPrecioLinea();
									$totalPedido = $totalPedido + $precioLn;
							?>
							<tr>
								<td><?php echo $idLn?></td>
								<td><?php echo $nombreCerveza?></td>
								<td><?php echo $nombreEnvase?></td>
								<td><?php echo $precioxenvase?></td>
								<td><?php echo $cantidad ?></td>
								<td><?php echo $precioLn?></td>


								<td align="center"><a href="<?php echo DIR . 'pedido/eliminarDePedido/' . $idLn ; ?>" class="btn btn-danger btn-block" style="color: white" role="button"><span class='glyphicon glyphicon-remove'></span></a></td>
							</tr>
							<?php
							   }
							}

							?>
						</tbody>
					</table>
					<br>
					<div align="center">
						<label style="font-size: 18px; color: green"><?php echo ' TOTAL  ' . '$'. $totalPedido;?></label>
					</div>
					<?php if(isset($_SESSION['pedido'])){
						if(count($lnPedido)>0){?>
					<div>
						<div class="row centered-form">
    						<div class="col-md-4 col-md-offset-2">
								<a href="<?php echo DIR . 'pedido/elegirEnvio';?>"><input type="button" class="btn btn-primary btn-block" style="color: white" value="Envio a Domicilio"></a>
							</div>
							<div class="col-md-4">
								<a href="<?php echo DIR . 'pedido/elegirSucursal';?>"><input type="button" class="btn btn-primary btn-block" style="color: white" value="Retirar en Sucursal"></a>
							</div>
							
						</div>
					</div>
					<?php }
				}?>
					<br>
				</div>
			</div>
		</div>
	</div>   						
</section>	