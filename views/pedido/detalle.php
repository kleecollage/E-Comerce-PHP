<h1>Detalle del Pedido</h1>
<?php if (isset($pedido)): ?>
    <?php if(isset($_SESSION['admin'])): ?>
    <h3>Cambiar Estado del Pedido</h3>
        <form action="<?=base_url?>Pedido/estado" method="post">
            <input type="hidden" value="<?=$pedido->getId()?>" name="pedido_id">
            <select name="estado">
                <option value="confirm" <?=$pedido->getEstado() == 'confirm' ? 'selected' : '' ;?>>Pendiente</option>
                <option value="preparation" <?=$pedido->getEstado() == 'preparation' ? 'selected' : '' ;?>>En Preparacion</option>
                <option value="ready" <?=$pedido->getEstado() == 'ready' ? 'selected' : '' ;?>>Listo para el Envio</option>
                <option value="sent" <?=$pedido->getEstado() == 'sent' ? 'selected' : '' ;?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar Estado">
        </form>
        <br/>
    <?php endif; ?>
    <h3>Direccion de Envio</h3>
    Provincia: <?= $pedido->getProvincia() ?>
    <br/>Ciudad: <?= $pedido->getLocalidad() ?>
    <br/>Direccion: <?= $pedido->getDireccion() ?>
    <br/>
    <br/>
    <h3>Datos del Pedido</h3>
    Estado: <?=Utils::showStatus($pedido->getEstado())?>
    <br/> Número de pedido: <?= $pedido->getId() ?>
    <br/> Total a pagar: $<?= $pedido->getCoste() ?>
    <br/><br/> <h4>Productos</h4>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()): ?>
            <tr>
                <td>
                    <?php if($producto->imagen != null): ?>
                        <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito">
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/logo.png" alt="logo" class="img_carrito">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?=base_url?>Productos/ver&id=<?=$producto->id_producto?>">
                        <?=$producto->nombre ?>
                    </a>
                </td>
                <td>
                    $<?=$producto->precio ?>
                </td>
                <td>
                    <?=$producto->unidades ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>