<?php if (isset($product)): ?>
    <h1><?= $product->getNombre() ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($product->getImagen() != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$product->getImagen()?>">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/logo.png" alt="logo">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $product->getDescripcion() ?></p>
            <p class="price">$<?= $product->getPrecio() ?></p>
            <a href="<?=base_url?>Carrito/add&id=<?=$product->getId()?>" class="button">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
