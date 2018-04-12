<?php namespace Vistas;

?>
<section>
	<div class="container">
        <div class="row centered-form">
        	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        		<div class="panel panel-default">
        			<div class="panel-heading">
			    		<h3  class="panel-title">Selecciona Envase <small></small></h3>
			 		</div>
			 		<div class="panel-body">
			    		<form role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="nombre">Nombre</label>
			    						<input type="text" name="nombre" id="nombre" class="form-control input-sm floatlabel" required=on value="<?php echo $cerv['nombre']; ?>" disabled="true">
			    					</div>
			    				</div>
			    				
			    			</div>
			    			
			    		</form>
			    		<form role='form' method="POST" action="<?php echo DIR .'cerveza/agregaEnvasesCerveza';?>" enctype="multipart/form-data">

		    				<div class="form-group">
		                		<label for="descripcion">Envase</label>
								<select name="envase" id="envase" class="form-control input-sm floatlabel">
	                				<?php  foreach ($envases as $i) {?>
	                				
								    <option value="<?php echo $i["idEnvase"] ?>"><?php echo $i['descripcion']; ?></option><?php } ?>    
								 </select>
	    					</div>

			    			<input type="hidden" name="idCerveza" id='idCerveza' value="<?php echo $cerv['idCerveza'] ?>">
			    			<input type="submit" class="btn btn-primary btn-block" value="Agregar" style="color: white">
			    			<br>
			    			<a href="<?php echo DIR .'cerveza/listarCervezas';?>">
			    				<input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver"></a>
			    		</form>
			     	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</section>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-7 col-md-offset-2">
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Listado de Envases <small></small></h3>
					 	</div>
					 			<table class="table table-inverse"  border="1">
					<thead>
						<tr>
							<th width="10px" >Id</th>
							<th width="60px" >Descripcion</th>
							<th width="90px">Litros</th>
							<th width="5px">Coeficiente</th>
							<th width="5px">Precio</th>
							<th width="5px"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($envaseCerveza as $i) {
						
					?>
					<tr>
						<td><?php echo $i['idEnvase'] ; ?></td>
						<td align="center"> <?php echo $i['descripcion']; ?></td>
						<td align="center"><?php echo $i['litros'] ; ?></td>
						<td align="center"><?php echo $i['coeficiente'] ; ?></td>
						<td align="center"><?php echo '$'.(($i['litros']*$cerv['precioLitro'])*(1-$i['coeficiente'])) ; ?></td>

						
						
						<td align="center"><a href="<?php echo DIR .'cerveza/eliminarEnvaseCerv/';?><?php echo $cerv['idCerveza']."/"; ?><?php echo $i['idEnvase']; ?>" 
							<?php if($i['estado']==1){?> class="btn btn-danger btn-block" <?php }else{?> class="btn btn-danger btn-block"<?php }?> style="color: white" role="button"> <span class='glyphicon glyphicon-remove'></span>  </a>
						</td>
						


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
