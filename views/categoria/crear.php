<h1>Crear Nueva Categoria</h1>
<form action="<?=base_url?>Categoria/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>

    <input type="submit" value="Guardar">
</form>