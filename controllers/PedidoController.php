<?php
require_once 'models/Pedido.php';
class PedidoController
{
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity'])){
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            if ($provincia && $localidad && $direccion){
                // Guardar datos en BD
                $pedido = new Pedido();
                $pedido->setUsuarioId($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                $save = $pedido->save();
                // Guardar linea pedido
                $save_linea = $pedido->save_linea();
                if ($save && $save_linea) {
                    $_SESSION['pedido'] = 'complete';
                } else {
                    $_SESSION['pedido'] = 'failed';
                }
            } else {
                $_SESSION['pedido'] = 'failed';
            }
        }else {
            // Redirigir al index
            header('Location:'.base_url);
        }
        header('Location:'.base_url.'Pedido/confirmado');
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuarioId($identity->id);

            $pedidoData = $pedido->getOneByUser();
            $pedido->setId($pedidoData->id);
            $pedido->setCoste($pedidoData->coste);

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedidoData->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos()
    {
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        // Sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            // sacar pedido
            $pedido = new Pedido();
            $pedido->setId($id);

            $pedidoData = $pedido->getOne();
            $pedido->setId($pedidoData->id);
            $pedido->setCoste($pedidoData->coste);
            $pedido->setProvincia($pedidoData->provincia);
            $pedido->setLocalidad($pedidoData->localidad);
            $pedido->setDireccion($pedidoData->direccion);
            $pedido->setEstado($pedidoData->estado);
            // sacar productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);
            require_once 'views/pedido/detalle.php';
        } else {
            header('Location:'.base_url.'Pedido/mis_pedidos');
        }
    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])){
            // recoger datos del form
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            // update del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();
            header('Location:'.base_url.'Pedido/detalle&id='.$id);
        } else {
            header('Location:'.base_url);
        }
    }
}