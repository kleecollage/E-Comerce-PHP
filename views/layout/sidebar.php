<!-- --------------------   BARRA LATERAL   -------------------- -->
<aside id="lateral">

    <div id="carrito" class="block_aside">
        <h3>Mi Carrito</h3>
        <ul>
            <?php $stats = Utils::statsCarrito() ?>
            <a href="<?=base_url?>Carrito/index"><li>Productos (<?=$stats['count']?>)</li></a>
            <a href="<?=base_url?>Carrito/index"><li>Total: $<?=$stats['total']?></li></a>
            <a href="<?=base_url?>Carrito/index"><li>Ver el carrito</li></a>
        </ul>
    </div>

    <div id="login" class="block_aside">
        <?php if(!isset($_SESSION['identity'])): ?>
            <h3>Entrar a la web</h3>
            <form action="<?=base_url?>Usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" />

                <label for="password">Contraseña</label>
                <input type="password" name="password" />

                <input type="submit" value="Enviar" />
            </form>
        <?php else: ?>
        <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>
        <ul>
            <?php if(isset($_SESSION['admin'])): ?>
                <li><a href="<?=base_url?>Categoria/index">Gestionar Categorias</a></li>
                <li><a href="<?=base_url?>Productos/gestion">Gestionar Productos</a></li>
                <li><a href="#">Gestionar Pedidos</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])): ?>
                <li><a href="#">Mis Pedidos</a></li>
                <li><a href="<?=base_url?>Usuario/logout">Cerrar Sesion</a></li>
            <?php else: ?>
                <li><a href="<?=base_url?>Usuario/registro">Registrate aqui</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<!-- --------------------   CONTENIDO CENTRAL   -------------------- -->
<div id="central">