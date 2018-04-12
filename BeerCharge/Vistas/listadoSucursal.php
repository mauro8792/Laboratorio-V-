<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Listado de Sucursales <small></small></h3>
					 	</div>
					 			<table class="table table-inverse"  border="1">
					<thead>
						<tr>
							<th width="10px">Id</th>
							<th width="300px">Direccion</th>
							<th width="90px">Telefono</th>
							<th width="120px">Localidad</th>
							<th width="120px">Provincia</th>
							<th width="5px"></th>
							<th width="5px"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($sucursales as $i) {
						
					?>
					<tr>
						<td><?php echo $i['idSucursal'] ; ?></td>
						<td align="center"> <?php echo $i['direccion'].'<br>'; ?><img src="<?php echo DIR . $i['foto'] ; ?> " width='90' ></td>
						<td align="center"><?php echo $i['telefono'] ; ?></td>
						<td align="center"><?php echo $i['localidad'] ; ?></td>
						<td align="center"><?php echo $i['provincia'] ; ?></td>

						<td align="center"><a href="<?php echo DIR .'sucursal/modificarSucursal/'?><?php echo $i['idSucursal']; ?>" <?php if($i['estado']==1){?> class="btn btn-success btn-block" <?php }else{?> class="btn btn-danger btn-block"<?php }?> style="color: white" role="button"> Editar</a></td>
						
						<td align="center"><a href="eliminarSucursal/<?php echo $i['idSucursal'] ; ?>" 
							<?php if($i['estado']==1){?> class="btn btn-success btn-block" <?php }else{?> class="btn btn-danger btn-block"<?php }?> style="color: white" role="button"> <?php if($i['estado']==1){echo "Disponible";}else {echo "No disponible";}  ?>     </a></td>
								
					</tr>
					<?php
					}
					?>
					</tbody>
				</table>
			    	</div>
		    	</div>
		    </div>
    	</div>
</section>