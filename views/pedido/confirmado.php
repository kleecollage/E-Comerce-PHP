<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete' ): ?>
    <h1>Su pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, Una vez que realices la transferencia bancaria
        a la cuenta #5577158648824AM con el coste del pedido, será procesado y enviado.
    </p>
    <br/>
    <?php if (isset($pedido)): ?>
        <h3>Datos del Pedido</h3>
        <br/> Número de pedido: <?= $pedido->getId() ?>
        <br/> Total a pagar: $<?= $pedido->getCoste() ?>
        <br/> Productos:
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
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete' ):  ?>
    <h1>Tu pedido no ha podido procesarse</h1>
<?php endif; ?>