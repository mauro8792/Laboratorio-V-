<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Listado de Cervezas <small></small></h3>
					 	</div>
					 			<table class="table table-inverse"  border="1">
					<thead>
						<tr>
							<th width="10px">id</th>
							<th width="100px">Nombre</th>
							<th width="35px">Descripcion</th>
							<th width="90px">Precio Lt</th>
							<th width="5px">Envases</th>
							<th width="5px"></th>
							<th width="5px"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($cervezas as $i) {
						
					?>
					<tr>
						<td><?php echo $i['idCerveza'] ; ?></td>
						<td align="center"> <?php echo $i['nombre'].'<br>'; ?><img src="<?php echo DIR . $i['foto'] ; ?> " width='75' ></td>
						<td><?php echo $i['descripcion'] ; ?></a></td>
						<td align="center"><?php echo "$".$i['precioLitro'] ; ?></td>
						<td align="center"><a href="<?php echo DIR .'cerveza/envaseCerveza/'?><?php echo $i['idCerveza']; ?>"> Ver Envases</a></td>

						<td align="center"><a href="<?php echo DIR .'cerveza/modificarCerveza/'?><?php echo $i['idCerveza']; ?>" <?php if($i['estado']==1){?> class="btn btn-success btn-block" <?php }else{?> class="btn btn-danger btn-block"<?php }?> style="color: white" role="button"> Editar</a></td>
						
						<td align="center"><a href="eliminarCerveza/<?php echo $i['idCerveza'] ; ?>" 
							<?php if($i['estado']==1){?> class="btn btn-success btn-block" <?php }else{?> class="btn btn-danger btn-block"<?php }?> style="color: white" role="button" > <?php if($i['estado']==1){echo "Disponible";}else {echo "No disponible";}  ?>    </a></td>
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

