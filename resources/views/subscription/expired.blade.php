<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción Expirada</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full text-center">
        <h1 class="text-2xl font-bold text-red-600 mb-4">Suscripción Expirada</h1>
        <p class="text-gray-600 mb-6">
            Tu período de prueba o suscripción ha finalizado. Por favor, realiza el pago para continuar utilizando el servicio.
        </p>
        <a href="#" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition">
            Renovar Suscripción
        </a>
    </div>
</body>
</html>
