<?php namespace Vistas;

?>
<section>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Registrar Personal <small></small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="POST" action="<?php echo DIR . 'admin/editarPersonal';?>">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                		<input type="number" name="legajo" id="legajo" class="form-control input-sm floatlabel" disabled="true" value='<?php echo $legajo ?>'>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                			<input type="text" name="nombre" id="nombre" class="form-control input-sm floatlabel" required="on" value="<?php echo $pers['nombre']; ?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="apellido" id="apellido" class="form-control input-sm" required="on" value="<?php echo $pers['apellido'] ?>">
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                		<input type="text" maxlength="8" name="dni" id="dni" class="form-control input-sm floatlabel" required="on" value="<?php echo $pers['dni'] ?>">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			               				 <input type="text" name="direccion" id="direccion" class="form-control input-sm floatlabel" required="on" value="<?php echo $pers['direccion'] ?>"">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="telefono" id="telefono" class="form-control input-sm" required="on" value="<?php echo $pers['telefono'] ?>">
			    					</div>
			    				</div>
			    			</div>
			    			

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" required="on" value="<?php echo $pers['email'] ?>">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" required="on" placeholder="Password" maxlength="8">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password2"  id="password2" class="form-control input-sm" required="on" placeholder="Confirmar Password" maxlength="8">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<select  name='rol' id='rol' class="form-control input-sm" required="on">
			    					<option value='Empleado'>Empleado</option>
			    					<option value="Administrador">Administrador</option>
			    				</select>
			    			</div>
			    			<input type="hidden" name="idlegajo" id="idlegajo" value="<?php echo $legajo ?>"">
			    			<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Guardar">
			    			<br>
			    			<a href="<?php echo DIR .'admin/listarPersonal';?>">
			    				<input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver"></a>
			    		</form>
			    		<br>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</section>