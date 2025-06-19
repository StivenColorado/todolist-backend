# Todo API - Laravel 12

Una API RESTful moderna construida con Laravel 12 para gestión de tareas (todos), con documentación interactiva Swagger y arquitectura escalable.

## 🚀 Características

- **API RESTful completa** con operaciones CRUD
- **Laravel 12** - La última versión del framework
- **Documentación interactiva** con Swagger/OpenAPI
- **Validación robusta** de datos de entrada
- **Manejo de errores** estructurado
- **Respuestas JSON** consistentes
- **Arquitectura limpia** siguiendo las mejores prácticas de Laravel

## 📋 Requisitos del Sistema

- PHP >= 8.2
- Composer
- MySQL/PostgreSQL/SQLite

## 🛠️ Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/todo-api-laravel.git
cd todo-api-laravel
```

### 2. Instalar dependencias

```bash
composer install
```


### 3. Configurar base de datos

Edita el archivo `.env` con tus credenciales de base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_api
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

### 4. Ejecutar migraciones

```bash
php artisan migrate
```

### 5. Publicar configuración de Swagger (opcional)

```bash
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
```

### 6. Iniciar el servidor

```bash
php artisan serve
```

La aplicación estará disponible en `http://127.0.0.1:8000`

## 📚 Documentación de la API

### Swagger UI
Accede a la documentación interactiva en: `http://127.0.0.1:8000/api/documentation`

### Endpoints Disponibles

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/api/todos` | Obtener todos los todos |
| POST | `/api/todos` | Crear un nuevo todo |
| GET | `/api/todos/{id}` | Obtener un todo específico |
| PUT | `/api/todos/{id}` | Actualizar un todo completo |
| PATCH | `/api/todos/{id}` | Actualizar parcialmente un todo |
| DELETE | `/api/todos/{id}` | Eliminar un todo |

### Estructura de Datos

#### Todo Object
```json
{
  "id": 1,
  "title": "Completar el proyecto",
  "description": "Finalizar la API de todos con Laravel 12",
  "completed": false,
  "created_at": "2025-06-18T10:30:00.000000Z",
  "updated_at": "2025-06-18T10:30:00.000000Z"
}
```

## 🔧 Uso de la API

### Crear un Todo

```bash
curl -X POST http://127.0.0.1:8000/api/todos \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "title": "Mi nueva tarea",
    "description": "Descripción de la tarea"
  }'
```

### Obtener todos los Todos

```bash
curl -X GET http://127.0.0.1:8000/api/todos \
  -H "Accept: application/json"
```

### Actualizar un Todo

```bash
curl -X PUT http://127.0.0.1:8000/api/todos/1 \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "title": "Tarea actualizada",
    "completed": true
  }'
```

### Eliminar un Todo

```bash
curl -X DELETE http://127.0.0.1:8000/api/todos/1 \
  -H "Accept: application/json"
```

## ⚙️ Configuración

### Variables de Entorno

```env
# Aplicación
APP_NAME="Todo API"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

# Base de Datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todolistapp
DB_USERNAME=root
DB_PASSWORD=tu_contra

# Swagger
L5_SWAGGER_GENERATE_ALWAYS=true
SWAGGER_VERSION=3.0.0
```

## 🧪 Testing

### Ejecutar tests

```bash
# Todos los tests
php artisan test

# Tests específicos
php artisan test --filter TodoControllerTest
```

### Ejemplos con Postman

1. Importa la colección desde `/docs/postman_collection.json`
2. Configura la variable de entorno `base_url` como `http://127.0.0.1:8000`
3. Ejecuta las pruebas automáticamente

## 🔍 Validaciones

### Crear Todo
- `title`: Requerido, string, máximo 255 caracteres
- `description`: Opcional, string, máximo 1000 caracteres

### Actualizar Todo
- `title`: Opcional, string, máximo 255 caracteres
- `description`: Opcional, string, máximo 1000 caracteres
- `completed`: Opcional, boolean

## 🚨 Manejo de Errores

La API devuelve errores en formato JSON estructurado:

```json
{
  "error": "Descripción del error",
  "message": "Mensaje detallado",
  "status": 400
}
```

### Códigos de Estado HTTP

- `200` - OK
- `201` - Creado exitosamente
- `400` - Solicitud incorrecta
- `404` - Recurso no encontrado
- `422` - Errores de validación
- `500` - Error interno del servidor

## 🏗️ Arquitectura

```
app/
├── Http/
│   └── Controllers/
│       └── TodoController.php
├── Models/
│   └── Todo.php
└── ...

routes/
├── api.php
└── web.php

database/
├── migrations/
└── seeders/
```

## 📝 Convenciones de Código

- Seguir PSR-12 para estilo de código PHP
- Usar nombres descriptivos para variables y métodos
- Documentar métodos públicos con PHPDoc
- Escribir tests para nuevas funcionalidades


## 📞 Soporte

- Documentación: `http://127.0.0.1:8000/api/documentation`

---

⭐ Si este proyecto te fue útil, ¡no olvides darle una estrella en GitHub!

## 🔄 Changelog

### v1.0.0 (2025-06-18)
- ✨ API RESTful completa para gestión de todos
- 📚 Documentación Swagger integrada
- 🔧 Validaciones robustas
- 🚀 Arquitectura escalable con Laravel 12