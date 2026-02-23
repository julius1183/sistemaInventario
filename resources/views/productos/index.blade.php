<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-radius: 12px; }
        .table-header { background-color: #4e73df; color: white; }
        .btn-success { background-color: #2e7d32; border: none; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4 mb-5">
                    <h2 class="text-center mb-4">Gestión de Productos (Full Stack)</h2>
                    
                    <div class="mb-4">
                        <h5 class="text-muted">Registrar Nuevo Producto</h5>
                        <form id="form-producto" class="row g-3">
                            <div class="col-md-4">
                                <input type="text" id="nombre" class="form-control" placeholder="Nombre del producto" required>
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="precio" class="form-control" placeholder="Precio" step="0.01" required>
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="stock" class="form-control" placeholder="Stock" required>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success w-100">Guardar</button>
                            </div>
                        </form>
                    </div>

                    <hr>

                    <table class="table table-hover mt-3">
                        <thead class="table-header">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-productos">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // 1. CARGAR PRODUCTOS AL ABRIR LA PÁGINA
        function cargarProductos() {
            fetch('/api/productos')
                .then(response => response.json())
                .then(data => {
                    let tabla = document.getElementById('tabla-productos');
                    tabla.innerHTML = ""; // Limpiamos la tabla antes de cargar
                    data.forEach(producto => {
                        tabla.innerHTML += `
                            <tr>
                                <td>${producto.id}</td>
                                <td>${producto.nombre}</td>
                                <td>$${producto.precio}</td>
                                <td>${producto.stock}</td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white">Ver</button>
                                    <button class="btn btn-sm btn-danger" onclick="eliminarProducto(${producto.id})">Borrar</button>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => console.error('Error cargando productos:', error));
        }

        // 2. FUNCIÓN PARA GUARDAR UN PRODUCTO (POST)
        document.getElementById('form-producto').addEventListener('submit', function(e) {
            e.preventDefault(); 

            let datos = {
                nombre: document.getElementById('nombre').value,
                precio: document.getElementById('precio').value,
                stock: document.getElementById('stock').value
            };

            fetch('/api/productos', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(datos)
            })
            .then(response => response.json())
            .then(data => {
                alert("¡Producto guardado con éxito!");
                document.getElementById('form-producto').reset(); // Limpia el formulario
                cargarProductos(); // Recarga la tabla sin refrescar toda la página
            })
            .catch(error => alert("Hubo un error al guardar"));
        });

        // 3. FUNCIÓN PARA ELIMINAR UN PRODUCTO (DELETE)
        function eliminarProducto(id) {
            if (confirm('¿Realmente deseas eliminar este producto?')) {
                fetch(`/api/productos/${id}`, {
                    method: 'DELETE',
                    headers: { 'Content-Type': 'application/json' }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    cargarProductos(); // Actualiza la lista
                })
                .catch(error => alert("No se pudo eliminar el producto"));
            }
        }

        // Ejecutar la carga inicial cuando cargue la página
        cargarProductos();
    </script>
</body>
</html>