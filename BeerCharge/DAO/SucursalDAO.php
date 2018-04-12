<?php

namespace DAO;

Use Modelo\Sucursal as Sucursal;
Use DAO\Conexion as Conexion;

/**
 * 
 */
class SucursalDAO implements IDAO {

    private function __construct() {
        
    }

    protected $table = 'sucursales';
    protected static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function insertar($sucursal) {
        try {
            $direccion = $sucursal->getDireccion();
            $telefono = $sucursal->getTelefono();
            $localidad = $sucursal->getLocalidad();
            $provincia = $sucursal->getProv();
            $ubicacion = $sucursal->getUbicacion();
            $latitud = $sucursal->getLatitud();
            $longitud = $sucursal->getLongitud();
            $foto = $sucursal->getFoto();
            $con = new Conexion();
            $conexion = $con->conectar();

            $sql = "insert into sucursales values(0, :direccion, :telefono, :localidad,:provincia, :ubicacion, :latitud, :longitud, :foto,1)";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":direccion", $direccion);
            $statement->bindParam(":telefono", $telefono);
            $statement->bindParam(":localidad", $localidad);
            $statement->bindParam(":provincia", $provincia);
            $statement->bindParam(":ubicacion", $ubicacion);
            $statement->bindParam(":latitud", $latitud);
            $statement->bindParam(":longitud", $longitud);
            $statement->bindParam(":foto", $foto);
            $statement->execute();

            $message = "Guardado exitosamente!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
    }

    public function listar() {
        $fila = null;
        try {
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql = "select * from sucursales";
            $statement = $conexion->prepare($sql);
            $statement->execute();
            $resultado = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
        return $resultado;
    }

    public function listarAct() {
        $fila = null;
        try {
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql = "select * from sucursales where estado <> 0";
            $statement = $conexion->prepare($sql);
            $statement->execute();
            $resultado = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
        return $resultado;
    }

    public function eliminar($idSucursal) {
        try {
            $estado = 0;
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql = "update sucursales set estado = :estado where idSucursal = :idSucursal";

            $statement = $conexion->prepare($sql);
            $statement->bindParam(':estado', $estado);
            $statement->bindParam(':idSucursal', $idSucursal);
            $statement->execute();

            $message = "Guardado exitosamente!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
    }

    public function modificar($sucursal, $idSucursal) {
        try {
            $estado = 1;
            $direccion = $sucursal->getDireccion();
            $telefono = $sucursal->getTelefono();
            $localidad = $sucursal->getLocalidad();
            $provincia = $sucursal->getProv();
            $ubicacion = $sucursal->getUbicacion();
            $foto = $sucursal->getFoto();

            $con = new Conexion();
            $conexion = $con->conectar();
            $sql = "update sucursales set direccion= :direccion, telefono = :telefono, localidad = :localidad, provincia= :provincia, ubicacion= :ubicacion,foto = :foto, estado = :estado  where idSucursal = :idSucursal";
            $statement = $conexion->prepare($sql);

            $statement->bindParam(':idSucursal', $idSucursal);
            $statement->bindParam(':direccion', $direccion);
            $statement->bindParam(':telefono', $telefono);
            $statement->bindParam(':localidad', $localidad);
            $statement->bindParam(':provincia', $provincia);
            $statement->bindParam(":ubicacion", $ubicacion);
            $statement->bindParam(":foto", $foto);
            $statement->bindParam(':estado', $estado);
            $statement->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
    }

    public function buscar($idSucursal) {
        $resultado = null;
        try {
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql = "select * from sucursales where idSucursal = :idSucursal";

            $statement = $conexion->prepare($sql);
            $statement->bindParam(':idSucursal', $idSucursal);
            $statement->execute();
            $resultado = $statement->fetch();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
        return $resultado;
    }

    public function eliminarLogicoSucur($idSucursal, $estado) {
        try {
            echo $idSucursal;
            echo $estado;
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql = "update sucursales set estado = :estado where idSucursal = :idSucursal";

            $statement = $conexion->prepare($sql);
            $statement->bindParam(':idSucursal', $idSucursal);
            $statement->bindParam(':estado', $estado);
            $statement->execute();

            $message = "Eliminado exitosamente!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
    }

    public function buscarUltimo() {
        $resultado = null;
        try {
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql = "select * from sucursales order by idSucursal desc limit 1";

            $statement = $conexion->prepare($sql);
            $statement->execute();
            $resultado = $statement->fetch();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
        return $resultado;
    }

    public function buscarxId($idSucursal) {
        $resultado = null;
        try {
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql = "select * from sucursales where idSucursal = :idSucursal";

            $statement = $conexion->prepare($sql);
            $statement->bindParam(':idSucursal', $idSucursal);
            $statement->execute();
            $resultado = $statement->fetch();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $con = null;
        return $resultado;
    }

    public function CrearMarcadores() {

        //$db = DAODatabase::getInstance();

        $con = new Conexion();
        $conexion = $con->conectar();
        $query = "select * from sucursales";

        $command = $conexion->prepare($query);
        $command->execute();

        header("Content-type: text/xml");

        // Start XML file, echo parent node
        $marcas = '<markers>';

        if ($command->execute()) {
            while ($row = $command->fetch()) {
                $marcas .= '<marker ';
                $marcas .= 'name="' . ($row['localidad']) . '" ';
                $marcas .= 'address="' . ($row['direccion']) . '" ';
                $marcas .= 'lat="' . $row['latitud'] . '" ';
                $marcas .= 'lng="' . $row['longitud'] . '" ';
                $marcas .= 'phone="' . $row['telefono'] . '" ';
                $marcas .= '></marker>';
            }
        }
        // End XML file
        $marcas .= '</markers>';
        return $marcas;
    }

}

?>