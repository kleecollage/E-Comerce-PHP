<!DOCTYPE HTML>
<html>
<head>
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>
<body>
<div id="container">
    <!-- --------------------   CABECERA   -------------------- -->
    <header id="header">
        <div id="logo">
            <img src="<?=base_url?>assets/img/logo.png" alt="Logo">
            <a href="<?=base_url?>">Tienda de Camisetas</a>
        </div>
    </header>
    <!-- --------------------   MENU   -------------------- -->
    <nav id="menu">
        <?php $categorias = Utils::showCategorias(); ?>
        <ul>
            <li>
                <a href="<?=base_url?>">Inicio</a>
            </li>
            <?php while ($cat = $categorias->fetch_object()):  ?>
                <li>
                    <a href="<?=base_url?>Categoria/ver&id=<?=$cat->id?>"><?= $cat->nombre ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </nav>
    <!-- CONTENT (sidebar/registro/destacado/etc) -->
    <div id="content">

