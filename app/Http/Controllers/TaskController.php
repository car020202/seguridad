<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Mostrar todas las tareas
    public function index()
    {
        $tasks = Task::all();
        return view('home', compact('tasks'));
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Task::create(['name' => $request->name]);

        return redirect()->back();
    }

    // Actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back();
    }
}
