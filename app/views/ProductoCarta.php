<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Productos</title>
    <style>
        
    </style>
    <link rel="stylesheet" href="../../static/css/productocarta.css">

</head>
<body>
    <div class="contenedor">
        <div class="formulario">
            <h2>Registro de Productos</h2>
            <form>
                <div class="filas">
                    <label for="codigo-producto">Código:</label>
                    <input type="text" id="codigo-producto" name="codigo-producto">
                    <label for="nombre-producto">Nombre:</label>
                    <input type="text" id="nombre-producto" name="nombre-producto">
                </div>
                <div class="filas">
                    <label for="precio-producto">Precio:</label>
                    <input type="number" id="precio-producto" name="precio-producto">
                    <label for="cantidad-producto">Cantidad:</label>
                    <input type="number" id="cantidad-producto" name="cantidad-producto">
                </div>
                <div class="filas">
                    <label for="descripcion-producto">Descripción:</label>
                    <textarea id="descripcion-producto" name="descripcion-producto"></textarea>
                </div>
                <div class="filas">
                    <label for="categoria-producto">Categoría:</label>
                    <select id="categoria-producto" name="categoria-producto">
                        <option value="1">Categoría 1</option>
                        <option value="2">Categoría 2</option>
                        <option value="3">Categoría 3</option>
                    </select>
                    <label for="tipo-producto">Tipo:</label>
                    <select id="tipo-producto" name="tipo-producto">
                        <option value="1">Tipo 1</option>
                        <option value="2">Tipo 2</option>
                        <option value="3">Tipo 3</option>
                    </select>
                </div>
                <div class="filas">
                    <label for="categoria-producto">Categoría:</label>
                    <select id="categoria-producto" name="categoria-producto" required>
                        <?php 
                        require_once '../../app/controllers/productos.php';
                        if (count($categorias) > 0): ?>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?php echo $categoria['IDCategoria']; ?>">
                                    <?php echo htmlspecialchars($categoria['NomCategoria']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No hay categorías disponibles</option>
                        <?php endif; ?>
                    </select>                        
                    <label for="tipo-producto">Tipo:</label>
                    <select id="tipo-producto" name="tipo-producto" required>
                        <?php 
                        require_once '../../app/controllers/productos.php';
                        if (count($tipos) > 0): ?>
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?php echo $tipo['IDTipo']; ?>">
                                    <?php echo htmlspecialchars($tipo['NomTipo']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No hay tipos disponibles</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="filas">                
                    <label for="foto-producto">Foto:</label>
                    <!--input type="file" id="foto-producto" class="boton-foto" name="foto-producto" onchange="mostrarImagen(this)"-->
                    <input type="file" id="foto-producto" name="foto-producto" onchange="mostrarImagen(this)" class="boton-foto" style="display: none;"> <!-- Ocultar el input original -->
                    <button type="button" class="boton-estilizado" onclick="document.getElementById('foto-producto').click();">Seleccionar Foto</button> <!-- Botón estilizado -->
                    <img id="imagen-previa" src="" alt="Imagen de previsualización" class="img-prev">
                </div>                                            
                <input type="submit" value="Registrar">
            </form>
        </div>
        <div class="lista-productos">
        <h2>Lista de Productos</h2>
        <?php 
        require_once '../../app/controllers/productos.php';
        foreach ($productos as $producto): ?>
            <div class="producto">
                <span><?php echo htmlspecialchars($producto['NomProducto']); ?></span>
                <span>$<?php echo number_format($producto['PrecioUnitario'], 2); ?></span>
                <span><?php echo htmlspecialchars($producto['Cantidad']); ?></span>
                <span><?php echo htmlspecialchars($producto['IDCategoria']); ?></span>
                <span><?php echo htmlspecialchars($producto['IDTipo']); ?></span>
                <button class="editar">✏️</button>
                <button class="eliminar">🗑️</button>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</body>
</html>
<script>
    function mostrarImagen(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagen-previa').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>