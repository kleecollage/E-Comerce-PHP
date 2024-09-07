<h1>Algunos de Nuestros Productos</h1>
<?php while($product = $productos->fetch_object()): ?>
    <div class="product">
        <a href="<?=base_url?>Productos/ver&id=<?=$product->id?>">
            <?php if ($product->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/logo.png" alt="logo">
            <?php endif; ?>
            <h2><?= $product->nombre ?></h2>
        </a>
        <p><?= $product->precio ?></p>
        <a href="<?=base_url?>Carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
    </div>
<?php endwhile; ?>
