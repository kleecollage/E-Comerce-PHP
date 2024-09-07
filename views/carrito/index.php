<h1>Carrito de Compra</h1>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php
        foreach ($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
        //var_dump($elemento['id_producto']);
    ?>
    <tr>
        <td>
            <?php if($elemento['imagen'] != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$elemento['imagen']?>" class="img_carrito">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/logo.png" alt="logo" class="img_carrito">
            <?php endif; ?>
        </td>
        <td>
            <a href="<?=base_url?>Productos/ver&id=<?=$elemento['id_producto']?>">
                <?=$elemento['nombre'] ?>
            </a>
        </td>
        <td>
            <?=$elemento['precio'] ?>
        </td>
        <td>
            <?=$elemento['unidades'] ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<br/>
<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio Total: $<?= $stats['total'] ?></h3>
    <a href="" class="button button-pedido">Hacer Pedido</a>
</div>
