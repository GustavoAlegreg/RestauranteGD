<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        .contenedor {
            display: flex;
            justify-content: space-between;
        }
        .carrito {
            width: 40%;
            margin: 20px;
        }
        .datos-compra {
            width: 40%;
            margin: 20px;
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
        }
        .carta-producto .info-producto .cantidad button {
            margin: 0 5px;
        }
        .carta-producto .info-producto .eliminar {
            cursor: pointer;
            display: inline-block;
            width: 24px;
            height: 24px;
            background-image: url('eliminar-icono.png');
            background-size: cover;
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
                    <span class="cantidad"><button onclick="decreaseQuantity(this)">-</button>2<button onclick="increaseQuantity(this)">+</button></span>
                    <span class="eliminar"></span>
                    <span class="precio">$10.00</span>
                </div>
            </div>
            <div class="carta-producto">
                <div class="info-producto">
                    <span class="nombre-producto">Producto B</span>
                    <span class="codigo-producto">Código: 456</span>
                </div>
                <div class="info-producto-derecha">
                    <span class="cantidad"><button onclick="decreaseQuantity(this)">-</button>3<button onclick="increaseQuantity(this)">+</button></span>
                    <span class="eliminar"></span>
                    <span class="precio">$20.00</span>
                </div>
            </div>
            <div class="carta-producto">
                <div class="info-producto">
                    <span class="nombre-producto">Producto C</span>
                    <span class="codigo-producto">Código: 789</span>
                </div>
                <div class="info-producto-derecha">
                    <span class="cantidad"><button onclick="decreaseQuantity(this)">-</button>1<button onclick="increaseQuantity(this)">+</button></span>
                    <span class="eliminar"></span>
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
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"><br><br>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="direccion">Dirección:</label>
                <textarea id="direccion" name="direccion"></textarea><br><br>
                <input type="submit" value="Finalizar Compra">
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
    </script>
</body>
</html>