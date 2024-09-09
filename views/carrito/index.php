<h1>Carrito de Compra</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
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
                <div class="updown-unidades">
                    <a href="<?=base_url?>Carrito/down&index=<?=$indice?>" class="button">-</a>
                    <a href="<?=base_url?>Carrito/up&index=<?=$indice?>" class="button">+</a>
                </div>
            </td>
            <td>
                <a href="<?=base_url?>Carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar Producto</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br/>
    <div class="delete-carrito">
        <a href="<?=base_url?>Carrito/delete_all" class="button button-delete button-red">Vaciar Carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>Precio Total: $<?= $stats['total'] ?></h3>
        <a href="<?=base_url?>Pedido/hacer" class="button button-pedido">Hacer Pedido</a>
    </div>
<?php else: ?>
    <p>El carrito esta vacio, añade algun producto</p>
<?php endif; ?>