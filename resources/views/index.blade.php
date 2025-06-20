<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo API App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col justify-center items-center p-6">

    <div class="max-w-2xl w-full text-center">
        <h1 class="text-4xl font-bold text-blue-600 mb-4">Todo API App</h1>
        <p class="text-lg mb-6">Bienvenido a la API de gestión de tareas. Esta API permite crear, listar, actualizar y eliminar tus tareas de forma sencilla.</p>

        <div class="bg-white rounded-2xl shadow p-6 text-left space-y-4">
            <h2 class="text-2xl font-semibold text-gray-700">Endpoints disponibles</h2>
            <ul class="list-disc list-inside space-y-2">
                <li><strong>GET api/todos</strong> - Obtener todas las tareas</li>
                <li><strong>POST api/todos</strong> - Crear una nueva tarea</li>
                <li><strong>PUT api/todos/{id}</strong> - Actualizar una tarea</li>
                <li><strong>DELETE api/todos/{id}</strong> - Eliminar una tarea</li>
            </ul>
        </div>
        <a href="{{ url('/api/documentation#/default') }}" class="inline-block mt-6 bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700 transition">Ver documentacion</a>
        <a href="{{ url('/api/todos') }}" class="inline-block mt-6 bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">Ver Tareas</a>
    </div>

</body>
</html>
