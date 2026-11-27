<?php
namespace App\Http\Controllers;
use App\Models\Tarea;
class TareaController
{
    public function index()
    {
        return view('tareas.index', ['tareas' => Tarea::orderBy('id')->get()]);
    }
}
