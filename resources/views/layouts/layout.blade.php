<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Finanzas</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Aquí puedes incluir Tailwind CSS u otros estilos -->
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-blue-600 p-4 text-white">
        <h1>Finanzas</h1>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="{{ route('transactions.create') }}" class="hover:underline">Agregar Transacción</a></li>
            </ul>
        </nav>
    </header>

    <main class="p-6">
        @yield('content')
    </main>

    {{-- <footer class="bg-gray-800 p-4 text-center text-white">
        <p>© 2024 Control de Finanzas</p>
    </footer> --}}
</body>
</html>
