<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - @yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* AQUÍ PEGA TU CSS DEL PROYECTO NATIVO */
        body { background-color: #f8f9fc; }
        .sidebar { min-height: 100vh; background: #4e73df; color: white; width: 250px; }
        .content { flex-grow: 1; padding: 20px; }
    </style>
</head>
<body>

    <div class="d-flex">
        <div class="sidebar p-3">
            <h4>Mi Sistema</h4>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/inventario" class="nav-link text-white">📦 Productos</a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">👥 Proveedores</a>
                </li>
            </ul>
        </div>

        <div class="content">
            <nav class="navbar navbar-light bg-white mb-4 shadow-sm p-3">
                <span class="navbar-brand mb-0 h1">Dashboard Profesional</span>
            </nav>

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>