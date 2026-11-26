<?php
namespace App\Http\Controllers;
use App\Models\Mascota;
class MascotaController
{
    public function index()
    {
        return view('mascotas.index', ['mascotas' => Mascota::orderBy('id')->get()]);
    }
}
