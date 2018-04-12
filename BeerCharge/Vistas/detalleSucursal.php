<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Sucursal : <?php echo $idSucursal ; ?>  <small></small></h3>
					 	</div>
					 			<table class="table table-inverse"  border="1">
					<thead>
						<tr>
							<th width="300px">Direccion</th>
							<th width="120px">Localidad</th>
							<th width="120px">Provincia</th>
							<th width="90px">Telefono</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if(!empty($sucursal)){	
					?>
					<tr>
						<td><?php echo $sucursal['direccion'] ; ?></a></td>
						<td><?php echo $sucursal['localidad'] ; ?></td>
						<td><?php echo $sucursal['provincia'] ; ?></td>
						<td><?php echo $sucursal['telefono'] ; ?></td>
					</tr>
					<?php
					}
					?>
					</tbody>
				</table>
					<div class="row centered-form col-md-2 col-md-offset-5">
    					<a href="<?php echo DIR . 'pedido/listarPedidos';?>"><input type="button" class="btn btn-primary btn-block" style="color: white" value="Volver"></a>
					</div>
			    </div>
		    </div>
	   </div>
    </div>
</section>