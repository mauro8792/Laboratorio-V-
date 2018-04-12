<?php namespace Vistas;


?>
<section>
	<div class="container">
      	<div class="row centered-form">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
			    	
					<form  method="POST" action="<?php echo DIR .'pedido/consultaLitros'?>">
						<div class="row">
			    			<div class="col-md-2" style="margin-left: 60px">
			    				<br>
			    				<div class="form-group">
									<label>Desde</label>
									<input type="date" style="width: 140px" name="fechaDesde" id="fechaDesde">
									<br><br>
			    				</div>
			    			</div>
			    			<br>
			    			<div class="col-md-2" style="margin-left: 20px">
			    				<div class="form-group">
									<label>Hasta</label>
									<input type="date" style="width: 180px" name="fechaHasta" id="fechaHasta">
									<br><br>
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
				   		<h3 class="panel-title">Litros Pedidos <small></small></h3>
				 	</div>
					<table class="table table-inverse"  border="1" style="text-align: center">
						<thead>
							<tr>
								<th width="5px">Desde</th>
								<th width="5px">Hasta</th>
								<th width="10px">Cerveza</th>
								<th width="10px">Litros</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(!empty($litrosPedidos)){
								
								foreach ($litrosPedidos as $litros) {
									$cerveza = $litros['nombre'];
									$cantLitros = $litros['Total'];

								?>
									
							<tr>
							
								<td><?php echo $fechaDesde?></td>
								<td><?php echo $fechaHasta?></td>
								<td><?php echo $cerveza?></td>
								<td><?php echo $cantLitros?></td>
							
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

