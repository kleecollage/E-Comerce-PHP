<h1>Registrarse</h1>
<?php use helpers\Utils;

if (isset($_SESSION['register']) && $_SESSION['register']=='complete' ): ?>
    <strong class="alert-green">Registro competado exitosamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register']=='failed'): ?>
    <strong class="alert-red"> Registro fallido, Introduce bien los datos </strong>
    <p>Error: <?= $_SESSION['error_message']; ?></p>
<?php endif; ?>
<?php Utils::deleteSession('register') ; ?>
<form action="<?=base_url?>Usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required/>

    <label for="email">Email</label>
    <input type="email" name="email" required/>

    <label for="password">Contraseña</label>
    <input type="password" name="password" required/>

    <input type="submit" value="Registrarse" />

</form>