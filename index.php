<!DOCTYPE HTML>
<html>
    <head>
        <title>Tienda de Camisetas</title>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <div id="container">
            <!-- --------------------   CABECERA   -------------------- -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                    <a href="index.php">Tienda de Camisetas</a>
                </div>
            </header>
            <!-- --------------------   MENU   -------------------- -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="">Inicio</a>
                    </li>
                    <li>
                        <a href="">Categoria</a>
                    </li>
                    <li>
                        <a href="">Categoria 2</a>
                    </li>
                    <li>
                        <a href="">Categoria 3</a>
                    </li>
                    <li>
                        <a href="">Categoria 4</a>
                    </li>
                    <li>
                        <a href="">Categoria 5</a>
                    </li>
                </ul>
            </nav>

            <div id="content">
                <!-- --------------------   BARRA LATERAL   -------------------- -->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                        <form action="#" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email" />

                            <label for="password">Contraseña</label>
                            <input type="password" name="password" />

                            <input type="submit" value="Enviar" />
                        </form>
                        <a href="#">Mis Pedidos</a>
                        <a href="#">Gestionar Pedidos</a>
                        <a href="#">Gestionar Categorias</a>
                    </div>
                </aside>
                <!-- --------------------   CONTENIDO CENTRAL   -------------------- -->
                <div id="central">
                    <div class="product">
                        <img src="assets/img/logo.png" alt="logo">
                        <h2>Camiseta Blanca Ajustada</h2>
                        <p>30 euros</p>

                        <a href="#">Comprar</a>
                        <img src="assets/img/logo.png" alt="logo">
                        <h2>Camiseta Blanca Ajustada</h2>
                        <p>30 euros</p>
                        <a href="#">Comprar</a>

                        <img src="assets/img/logo.png" alt="logo">
                        <h2>Camiseta Blanca Ajustada</h2>
                        <p>30 euros</p>
                        <a href="#">Comprar</a>
                    </div>
                </div>
            </div>
            <!-- --------------------   PIE DE PAGINA   -------------------- -->
            <footer id="footer">
                <p>Desarrollado por KleeCollage &copy; <?= DATE('Y') ?></p>
            </footer>
        </div>
    </body>
</html>
