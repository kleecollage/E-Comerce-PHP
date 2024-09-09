<?php
require_once 'models/Producto.php';
class CarritoController
{
    public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
            $carrito = $_SESSION['carrito'];
            // var_dump($carrito);
        } else {
            $carrito = array();
        }
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

    public function delete()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:".base_url."Carrito/index");
    }


    public function up()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("Location:".base_url."Carrito/index");
    }


    public function down()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;
            if ($_SESSION['carrito'][$index]['unidades'] == 0){
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location:".base_url."Carrito/index");
    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("Location:".base_url."Carrito/index");
    }
}