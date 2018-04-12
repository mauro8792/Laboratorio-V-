<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Listado de Envases <small></small></h3>
					 	</div>
					 			<table class="table table-inverse"  border="1">
					<thead>
						<tr>
							<th width="10px">Id</th>
							<th width="85px">Descripcion</th>
							<th width="90px">Litros</th>
							<th width="5px">Coeficiente</th>
							<th width="5px"></th>
							<th width="5px"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($envases as $i) {
						
					?>
					<tr>
						<td><?php echo $i['idEnvase'] ; ?></td>
						<td align="center"> <?php echo $i['descripcion'].'<br>'; ?><img src="<?php echo DIR . $i['foto'] ; ?> " width='90' ></td>
						<td align="center"><?php echo $i['litros'] ; ?></td>
						<td align="center"><?php echo $i['coeficiente'] ; ?></td>

						<td align="center"><a href="<?php echo DIR .'envase/modificarEnvase/'?><?php echo $i['idEnvase']; ?>" <?php if($i['estado']==1){?> class="btn btn-success btn-block" <?php }else{?> class="btn btn-danger btn-block"<?php }?> style="color: white" role="button"> Editar</a></td>
						
						<td align="center"><a href="eliminarEnvase/<?php echo $i['idEnvase'] ; ?>" 
							<?php if($i['estado']==1){?> class="btn btn-success btn-block" <?php }else{?> class="btn btn-danger btn-block"<?php }?> style="color: white" role="button"> <?php if($i['estado']==1){echo "Disponible";}else {echo "No disponible";}  ?>  </a></td>

							
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

