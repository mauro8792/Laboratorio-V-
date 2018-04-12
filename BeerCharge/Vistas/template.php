<?php namespace Vistas;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BeerCharge</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href= "/BeerCharge/Vistas/css/bootstrap.min.css" rel="stylesheet">
  <link href='/BeerCharge/Vistas/images/favicon.png' rel='shortcut icon' type='image/png'/>
  <link rel="stylesheet" type="text/css" href="/BeerChargeCopia/Vistas/css/fuente.css">
  <script src="/BeerCharge/Vistas/js/jquery.js"></script>
  <script src="/BeerCharge/Vistas/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      position: relative;
      margin-bottom: 0;
      border-radius: 0;
      background: rgba(0, 0, 0, 0.8);
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
      padding-top: 
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background: rgba(0, 0, 0, 0.8);
      color: grey;
      position: fixed;
      left:0px;
      bottom:0px;
      height:30px;
      width:100%;

    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

.centered-form{
  margin-top: 40px;

}

.centered-form .panel{
  background: rgba(255, 255, 255, 0.8);
  box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}

label.label-floatlabel {
    font-weight: bold;
    color: #46b8da;
    font-size: 11px;
} 
  </style>
</head>
<body>

<img id="estirada" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%" src="/BeerCharge/Vistas/images/ladrilloOscuro.jpg" /> 
<header>
        <nav class="navbar navbar-inverse" role="banner" style="width: 100%">
            <div id='wrapper' class="container">
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">

   <!-- <?php
    // if(isset($_SESSION['rol'])){
    // if ($_SESSION['rol']=='Administrador' or $_SESSION['rol']=='Empleado') {?> -->

                        <?php if (isset($_SESSION['user'])){
                            if($_SESSION['rol']=='Administrador'){?>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2>Personal &nbsp;&nbsp;</h2><span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR . 'admin/ingresarPersonal'?>"><h2 style="font-size: 25px">Nueva Empleado</h2></a></li>
                                <li><a href="<?php echo DIR . 'admin/listarPersonal'?>"><h2 style="font-size: 25px">Consultar Empleados</h2></a></li>
                            </ul>
                        </li> <!--  cierra el dropdown  !-->
                        <?php }?>
                        <?php if($_SESSION['rol']!='Cliente'){?>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="B" ><h2>Envases &nbsp;&nbsp;</h2> <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR. 'envase/ingresarEnvase'?>"><h2 style="font-size: 25px">Nueva Envase</h2></a></li>
                                <li><a href="<?php echo DIR. 'envase/listarEnvases'?>"><h2 style="font-size: 25px">Consultar Envases</h2></a></li>
                                
                            </ul>
                        </li> <!--  cierra el dropdown  !-->
                        
                  

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="" ><h2>Cervezas &nbsp;&nbsp;</h2> <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR . 'cerveza/ingresarCerveza'?>"><h2 style="font-size: 25px">Nueva Cerveza</h2></a></li>
                                <li><a href="<?php echo DIR . 'cerveza/listarCervezas'?>"><h2 style="font-size: 25px">Consultar Cervezas</h2></a></li>
                            </ul>
                        </li> <!--  cierra el dropdown  !-->    
                        </li><li class="dropdown">
                             <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2>Sucursales &nbsp;&nbsp;</h2> <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR . 'sucursal/ingresarSucursal'?>"><h2 style="font-size: 25px">Nueva Sucursal</h2></a></li>
                                <li><a href=" <?php echo DIR . 'sucursal/listarSucursales' ?>"><h2 style="font-size: 25px">Consultar Sucursal</h2></a></li>
                               <!-- <li><a href="../envase/buscarPorNombre">Buscar envase</a></li> -->
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="B" ><h2>Clientes &nbsp;&nbsp;</h2> <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR. 'admin/listarClientes/';?>"><h2 style="font-size: 25px">Clientes</h2></a></li>
                                <li><a href="<?php echo DIR. 'pedido/listarPedidos'?>"><h2 style="font-size: 25px">Consultar Pedidos</h2></a></li>
                                <li><a href="<?php echo DIR. 'pedido/listarLitrosPedidos'?>"><h2 style="font-size: 25px">Consultar Litros</h2></a></li>

                                
                            </ul>
                        </li> <!--  cierra el dropdown  !-->
                      <?php }
                        }?>
                      <!-- <?php 
                           // }
                           // } 
                      ?> -->
                      <?php if(!isset($_SESSION['user']) || $_SESSION['rol']=='Cliente'){?>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><h2>Sucursales &nbsp;&nbsp;</h2><span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR . 'sucursal/listarCliSucursales'?>"><h2 style="font-size: 25px">Consultar Sucursales</h2></a></li>
                                <li><a href="<?php echo DIR . 'sucursal/listarMapaSucursales'?>"><h2 style="font-size: 25px">Ver Mapa</h2></a></li>
                            </ul>
                        </li> <!--  cierra el dropdown  !-->

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="" ><h2>Cervezas &nbsp;&nbsp;</h2> <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR . 'cerveza/listarCliCervezas'?>"><h2 style="font-size: 25px">Consultar Cervezas</h2></a></li>
                            </ul>
                        </li> <!--  cierra el dropdown  !-->
                        
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="B" ><h2>Pedido &nbsp;&nbsp;</h2> <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR. 'pedido/elegirCerveza/';?>"><h2 style="font-size: 25px">Ver Cervezas</h2></a></li>
                                <!--<li><a href="<?php //echo DIR. 'pedido/verPedido'?>">Consultar Pedido</a></li>-->
                                <?php if(isset($_SESSION['user'])){
                                  if($_SESSION['rol']=='Cliente'){?>
                                <li><a href="<?php echo DIR. 'pedido/pedidosCliente/'; ?>"><h2 style="font-size: 25px">Pedidos Realizados</h2></a></li>
                                <?php
                                }}?>
                            </ul>
                        </li> <!--  cierra el dropdown  !-->
                        <?php }?>
                      
                      <?php if(!isset($_SESSION['user'])){?>  
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="" ><h2>Ingresar &nbsp;&nbsp;</h2> <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR. 'login/vistaLogin'?>"><h2 style="font-size: 25px">Login</h2></a></li>
                                <li><a href="<?php echo DIR. 'login/vistaRegistro'?>"><h2 style="font-size: 25px">Registrarse</h2></a></li>
                                
                            </ul>
                        </li> <!--  cierra el dropdown  !-->                 
                      <?php
                          }?> 
                      <?php if(isset($_SESSION['user'])){?>

                        <li class="dropdown">
                            <a href="../login/logout" class="dropdown-toggle" data-toggle="dropdown">
                             <h2><?php echo ' ' .  $_SESSION['user'];?></h2><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <?php if(($_SESSION['rol']==='Cliente')) {?>
                                <li><a href="<?php echo DIR . 'login/editarDatos'?>"><h2 style="font-size: 25px">Mis Datos</h2></a></li>
                                <?php } ?>
                                <li><a href="<?php echo DIR . 'login/logout'?>"><h2 style="font-size: 25px">Cerrar Sesion</h2></a></li>
                            
                            </ul>
                        </li>  <!--  cierra el dropdown  !-->
                        <?php
                          }?> 
                          
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
</header>



<footer id="footer" class= "navbar-fixed-bottom midnight-blue" style="padding-bottom: 40px">
        <div class="container ">
            <div class="row">
                <div class="col-md-8 col-md-offset-4">
                    <h2 style="font-size: 20px">&copy; 2017 Laboratorio 4. All Rights Reserved.</h2>
                </div>
            </div>
        </div>
    </footer>

<script type="text/javascript">

function CargarFoto(img, ancho, alto){
  derecha=(screen.width-ancho)/2;
  arriba=(screen.height-alto)/2;
  string="toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+ancho+",height="+alto+",left="+derecha+",top="+arriba+"";
  fin=window.open(img,"",string);
}

</script>
