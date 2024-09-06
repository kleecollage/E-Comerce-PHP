<h1>Gestion de Productos</h1>
<a href="<?=base_url?>Productos/crear" class="button button-small">
    Crear Producto
</a>
<!-- MENSAJE: CREAR PRODUCTO -->
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert-green">El producto se a creado exitosamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <strong class="alert-red">El producto NO se ha creado</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto') ?>
<!-- MENSAJE: ELIMINAR PRODUCTO -->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert-green">El producto se a eliminado exitosamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert-red">El producto NO se ha podido eliminar</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete') ?>
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($prod = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $prod->id; ?></td>
            <td><?= $prod->nombre; ?></td>
            <td><?= $prod->precio; ?></td>
            <td><?= $prod->stock; ?></td>
            <td>
                <a href="<?=base_url?>Productos/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>Productos/eliminar&id=<?=$prod->id?>" class="button  button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

