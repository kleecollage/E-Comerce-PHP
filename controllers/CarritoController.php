<?php
require_once 'models/Producto.php';
class CarritoController
{
    public function index()
    {
        $carrito = $_SESSION['carrito'];
        // var_dump($carrito);
        require_once 'views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else {
            header("Location:".base_url);
        }
        if (isset($_SESSION['carrito'])){
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento){
                if ($elemento['id_producto'] == $producto_id ){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0){
            // conseguir objeto producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto->getOne();
            var_dump($producto->getId());
            var_dump($producto->getPrecio());
            var_dump($producto->getImagen());
            if (is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->getId(),
                    "imagen" => $producto->getImagen(),
                    "nombre" => $producto->getNombre(),
                    "precio" => $producto->getPrecio(),
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        header("Location:".base_url."Carrito/index");
    }

    public function remove()
    {

    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("Location:".base_url."Carrito/index");
    }
}