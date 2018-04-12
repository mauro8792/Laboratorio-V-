<?php

namespace Controladora;

use Dao\SucursalDAO as SucursalDAO;
use Modelo\Sucursal as Sucursal;

/**
 * 
 */
class sucursalControlador {

    private $sucursal;

    function __construct() {
        $this->sucursal = SucursalDAO::getInstance();
    }

    public function ingresarSucursal() {
        require_once ROOT . "Vistas/template.php";
        require_once ROOT . "Vistas/gestionSucursal.php";
    }

    public function nuevaSucursal($direccion, $telefono, $localidad, $provincia, $ubicacion) {
        try {

            $domicilio = $direccion . ', ' . $localidad . ', ' . $provincia;
            $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($domicilio) . '&sensor=false');
            $geo = json_decode($geo, true);
            if ($geo['status'] = 'OK') {
                // Obtener los valores
                $latitud = $geo['results'][0]['geometry']['location']['lat'];
                $longitud = $geo['results'][0]['geometry']['location']['lng'];
            }
            //echo "Latitud: ".$latitud." longitud: ".$longitud;
            $imageDirectory = 'Vistas/images/';
            $message = null;
            $file = $imageDirectory . 'sinfoto.png';

            if (!file_exists($imageDirectory))
                mkdir($imageDirectory);

            if ($_FILES) {
                if ((isset($_FILES['fileToUpload'])) && ($_FILES['fileToUpload']['name'] != '')) {
                    $file = $imageDirectory . basename($_FILES['fileToUpload']['name']);

                    $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

                    $imageInfo = getimagesize($_FILES['fileToUpload']['tmp_name']);


                    if ($imageInfo !== false) {
                        if ($_FILES['fileToUpload']['size'] < 5000000) { //Menor a 5 MB
                            if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
                                $message = "No se pudo subir el archivo";
                            }
                        } else
                            $message = "el archivo es demasiado grande";
                    } else
                        $message = "el archivo no es un archivo de imagen";
                }
            }

            if (!is_null($message)) {
                echo "<script type='text/javascript'>alert('$message');</script>";
            }


            $sucur = new Sucursal($direccion, $telefono, $localidad, $provincia, $ubicacion, $longitud, $latitud, $file);
            $this->sucursal->insertar($sucur);
            $this->ingresarSucursal();
        } catch (PDOException $e) {

            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function listarSucursales() {
        $sucursales = $this->sucursal->listar();
        require_once ROOT . "Vistas/template.php";
        require_once ROOT . "Vistas/listadoSucursal.php";
    }

    public function listarCliSucursales() {
        $sucursales = $this->sucursal->listarAct();
        require_once ROOT . "Vistas/template.php";
        require_once ROOT . "Vistas/listadoCliSucursal.php";
    }

    public function listarMapaSucursales() {
        $sucursales = $this->sucursal->listarAct();
        //var_dump($sucursales);
        foreach ($sucursales as $i) {
            echo 'longitud=' . $i['longitud'] . '<br>';
            echo 'latitud=' . $i['latitud'] . '<br>' . '<br>';
        }
        //require_once ROOT.  "Vistas/template.php";
        //require_once ROOT . "Vistas/mapaSucursales.php";
        require_once ROOT . "Vistas/listadoMapaSucursal.php";
    }

    public function modificarSucursal($idSucursal) {
        $local = $this->sucursal->buscar($idSucursal);
        require_once ROOT . "Vistas/template.php";
        require_once ROOT . "Vistas/editarSucursal.php";
    }

    public function editarSucursal($direccion, $telefono, $localidad, $provincia, $ubicacion, $foto, $idSucursal) {
        $imageDirectory = 'Vistas/images/';
        $message = null;
        $file = null;

        if (!file_exists($imageDirectory))
            mkdir($imageDirectory);

        if ($_FILES) {
            if ((isset($_FILES['fileToUpload'])) && ($_FILES['fileToUpload']['name'] != '')) {
                $file = $imageDirectory . basename($_FILES['fileToUpload']['name']);

                $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

                $imageInfo = getimagesize($_FILES['fileToUpload']['tmp_name']);

                if ($imageInfo !== false) {
                    if ($_FILES['fileToUpload']['size'] < 5000000) { //Menor a 5 MB
                        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
                            $message = "No se pudo subir el archivo";
                        }
                    } else
                        $message = "el archivo es demasiado grande";
                } else
                    $message = "el archivo no es un archivo de imagen";
            }
        }

        if (is_null($file)) {
            $file = $_POST['foto'];
        }

        if (!is_null($message)) {
            echo "<script type='text/javascript'>alert('$message');</script>";
            $env = $this->envase->buscar($id);
            require_once ROOT . "Vistas/template.php"; //!!ver porque no anda el boostrap
            require_once ROOT . "Vistas/editarEnvase.php";
        } else {

            $local = new Sucursal($direccion, $telefono, $localidad, $provincia, $ubicacion, $file);
            $this->sucursal->modificar($local, $idSucursal);
            $sucursales = $this->sucursal->listar();
            require_once ROOT . "Vistas/template.php";
            require_once ROOT . "Vistas/listadoSucursal.php";
        }
    }

    public function eliminarSucursal($idLocal) {
        $idSucursal = null;
        $idSucursal = $idLocal;
        $loc = $this->sucursal->buscar($idSucursal);
        $estado = 1;
        if ($loc['estado'] == 1) {
            $estado = 0;
        }
        $this->sucursal->eliminarLogicoSucur($idSucursal, $estado);
        header('location: ../listarSucursales');
    }

    function Marcadores() {

        echo $this->DaoSucursales->CrearMarcadores();
    }

}

?>