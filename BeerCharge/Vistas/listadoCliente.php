<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-12 col-md-offset-0">
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Listado de Clientes <small></small></h3>
					 	</div>
					 			<table class="table table-inverse"  border="1">
					<thead>
						<tr>
							<th width="100px">Apellido</th>
							<th width="100px">Nombre</th>
							<th width="100px">Direccion</th>
							<th width="100px">Localidad</th>
							<th width="100px">Provincia</th>
							<th width="50px">Telefono</th>
							<th width="50px">Email</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($cliente)){ 
					foreach ($cliente as $i) {
						
					?>
					<tr>
						<td><?php echo $i['apellido'] ; ?></td>
						<td><?php echo $i['nombre'] ; ?></td>
						<td><?php echo $i['direccion'] ; ?></td>
						<td><?php echo $i['localidad'] ; ?></td>
						<td><?php echo $i['provincia'] ; ?></td>
						<td><?php echo $i['telefono'] ; ?></td>
						<td><?php echo $i['email'] ; ?></td>
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

