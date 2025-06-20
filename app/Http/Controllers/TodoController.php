<?php

namespace App\Http\Controllers;
use OpenApi\Annotations as OA; //swagger doc
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 * @OA\Info(
 *     title="API de Tareas",
 *     version="1.0",
 *     description="Documentación de la API de tareas"
 * )
 */

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     /**
     * @OA\Get(
     *     path="/api/todos",
     *     summary="Obtener todos los TODOs",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de tareas"
     *     )
     * )
     */

    public function index()
    {
        try {
            return response()->json(Todo::all());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

     /**
     * @OA\Post(
     *     path="/api/todos",
     *     summary="Crear un nuevo TODO",
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         required=true,
     *         description="Título de la tarea"
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         required=false,
     *         description="Descripción de la tarea"
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tarea creada exitosamente"
     *     )
     * )
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000'
            ]);

            $todo = Todo::create([
                'title' => $request->title,
                'description' => $request->description,
                'completed' => false,
            ]);

            return response()->json($todo, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */

     /**
     * @OA\Get(
     *     path="/api/todos/{id}",
     *     summary="Obtener un TODO específico",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la tarea"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea obtenida exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tarea no encontrada"
     *     )
     * )
     */
    public function show(string $id)
    {
        try {
            $todo = Todo::findOrFail($id);
            return response()->json($todo);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */

     /**
     * @OA\Put(
     *     path="/api/todos/{id}",
     *     summary="Actualizar un TODO específico",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la tarea"
     *     ),
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         required=false,
     *         description="Título de la tarea"
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         required=false,
     *         description="Descripción de la tarea"
     *     ),
     *     @OA\Parameter(
     *         name="completed",
     *         in="query",
     *         required=false,
     *         description="Estado de la tarea"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea actualizada exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tarea no encontrada"
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        try {
            // Log para debugging
            Log::info('PUT/PATCH request received', [
                'id' => $id,
                'request_data' => $request->all(),
                'method' => $request->method()
            ]);

            $todo = Todo::findOrFail($id);
            
            // Solo actualizar campos que están presentes
            $updateData = [];
            if ($request->has('title')) {
                $updateData['title'] = $request->title;
            }
            if ($request->has('description')) {
                $updateData['description'] = $request->description;
            }
            if ($request->has('completed')) {
                $updateData['completed'] = $request->boolean('completed');
            }

            if (!empty($updateData)) {
                $todo->update($updateData);
            }

            return response()->json($todo);
        } catch (\Exception $e) {
            Log::error('Error in update method', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

     /**
     * @OA\Delete(
     *     path="/api/todos/{id}",
     *     summary="Eliminar un TODO específico",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la tarea"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea eliminada exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tarea no encontrada"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();

            return response()->json(['message' => 'Todo con ID: ' . $id . ' eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}