<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        .contenedor {
            display: flex;
            justify-content: center; /* Cambio para centrar horizontalmente */
            align-items: center; /* Cambio para centrar verticalmente */
            height: 100vh; /* Añadido para que el contenedor ocupe toda la altura disponible */
        }
        .carrito {
            width: 40%;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Cambio para centrar verticalmente */
        }
        .datos-compra {
            width: 40%;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center; /* Cambio para centrar verticalmente */
        }
        .carta-producto {
            width: 100%;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .carta-producto .info-producto {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 40%; /* Agregado */
        }
        .carta-producto .info-producto .nombre-producto {
            font-weight: bold;
        }
        .carta-producto .info-producto .codigo-producto {
            color: #666;
        }
        .carta-producto .info-producto .cantidad {
            display: flex;
            align-items: center;
            background-color: #ddd; /* Color de fondo agregado */
        }
        .cantidad-btn{
            background-color: #ddd;
            border: none;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 20px; /* Diseño agregado */
            transition: background-color 0.3s ease; /* Diseño agregado */
            margin: 5px; /* Añadido */
        }
        .cantidad-btn:hover {
            background-color: #ccc; /* Diseño agregado */
        }
        .carta-producto .info-producto .eliminar {
            cursor: pointer;
            display: inline-block;
            width: 24px;
            height: 24px;
            background-size: cover;
            filter: invert(100%); /* Cambio de color */
            margin: 5px; /* Añadido */
        }
        .carta-producto .info-producto .precio {
            font-weight: bold;
        }
        .carta-producto .info-producto-derecha {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 60%; /* Agregado */
        }
        .datos-compra h1 {
            margin-bottom: 20px;
        }
        .datos-compra form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .datos-compra form label {
            margin-bottom: 10px;
        }
        .datos-compra form input[type="text"],
        .datos-compra form select,
        .datos-compra form textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .datos-compra form input[type="checkbox"] {
            margin-right: 10px;
        }
        .datos-compra form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .datos-compra form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="carrito">
            <h1>Carrito de Compras</h1>
            <div class="carta-producto">
                <div class="info-producto">
                    <span class="nombre-producto">Producto A</span>
                    <span class="codigo-producto">Código: 123</span>
                </div>
                <div class="info-producto-derecha">
                    <span class="cantidad">
                        <button class="cantidad-btn" onclick="decreaseQuantity(this)">-</button>
                        2
                        <button class="cantidad-btn" onclick="increaseQuantity(this)">+</button>
                    </span>
                    <button class="eliminar" onclick="eliminarProducto(this)">
                        <img src="../../static/icon/trash.png" alt="Eliminar" style="width: 24px; height: 24px;">
                    </button> <!-- El icono de basura se cambió aquí -->
                    <span class="precio">$10.00</span>
                </div>
            </div>
            <div class="carta-producto">
                <div class="info-producto">
                    <span class="nombre-producto">Producto B</span>
                    <span class="codigo-producto">Código: 456</span>
                </div>
                <div class="info-producto-derecha">
                    <span class="cantidad">
                        <button class="cantidad-btn" onclick="decreaseQuantity(this)">-</button>
                        3
                        <button class="cantidad-btn" onclick="increaseQuantity(this)">+</button>
                    </span>
                    <button class="eliminar" onclick="eliminarProducto(this)">
                        <img src="../../static/icon/trash.png" alt="Eliminar" style="width: 24px; height: 24px;">
                    </button> <!-- El icono de basura se cambió aquí -->
                    <span class="precio">$20.00</span>
                </div>
            </div>
            <div class="carta-producto">
                <div class="info-producto">
                    <span class="nombre-producto">Producto C</span>
                    <span class="codigo-producto">Código: 789</span>
                </div>
                <div class="info-producto-derecha">
                    <span class="cantidad">
                        <button class="cantidad-btn" onclick="decreaseQuantity(this)">-</button>
                        1
                        <button class="cantidad-btn" onclick="increaseQuantity(this)">+</button>
                    </span>
                    <button class="eliminar" onclick="eliminarProducto(this)">
                        <img src="../../static/icon/trash.png" alt="Eliminar" style="width: 24px; height: 24px;">
                    </button> <!-- El icono de basura se cambió aquí -->
                    <span class="precio">$30.00</span>
                </div>
            </div>
            <div class="carta-producto">
                <div class="info-producto">
                    <span class="nombre-producto">Total:</span>
                </div>
                <div class="info-producto-derecha">
                    <span class="precio">$140.00</span>
                </div>
            </div>
        </div>
        <div class="datos-compra">
            <h1>Datos de la Compra</h1>
            <form>
                <label for="nombre-completo">Nombre Completo:</label>
                <input type="text" id="nombre-completo" name="nombre-completo"><br><br>
                <label for="metodo-pago">Método de Pago:</label>
                <select id="metodo-pago" name="metodo-pago">
                    <option value="tarjeta">Tarjeta de Crédito</option>
                    <option value="paypal">PayPal</option>
                    <option value="transferencia">Transferencia Bancaria</option>
                </select><br><br>
                <label for="direccion">Dirección:</label>
                <textarea id="direccion" name="direccion"></textarea><br><br>
                <input type="checkbox" id="acepto-condiciones" name="acepto-condiciones" required>
                <label for="acepto-condiciones">Acepto las condiciones de compra</label><br><br>
                <input type="submit" value="Confirmar Compra">
            </form>
        </div>
    </div>
    <script>
        function increaseQuantity(button) {
            var quantity = button.parentNode.childNodes[1];
            quantity.nodeValue = parseInt(quantity.nodeValue) + 1;
        }
        function decreaseQuantity(button) {
            var quantity = button.parentNode.childNodes[1];
            if (parseInt(quantity.nodeValue) > 0) {
                quantity.nodeValue = parseInt(quantity.nodeValue) - 1;
            }
        }
        function eliminarProducto(button) {
            // Aquí se podría agregar la lógica para eliminar el producto del carrito
            alert('Producto eliminado del carrito');
        }
    </script>
</body>
</html>