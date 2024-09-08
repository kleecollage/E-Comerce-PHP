<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer Pedido</h1>
    <p>
        <a href="<?=base_url?>Carrito/index">Ver los Productos y El Precio del Pedido</a>
    </p>
    <br/>
    <h3>Direccion para el envio</h3>
    <form action="<?=base_url?>Pedido/add" method="post">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required/>

        <label for="localidad">Ciudad</label>
        <input type="text" name="localidad" required/>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" required/>

        <input type="submit" value="Confirmar Pedido">
    </form>




<?php else: ?>
    <h1>Debes Estar Identificado</h1>
    <p>Necesitar estar logueado en la web para poder realizar tu pedido.</p>
<?php endif; ?>