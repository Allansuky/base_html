<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = ['codigo', 'titulo', 'autor', 'anio_publicacion'];

    protected $casts = ['anio_publicacion' => 'integer'];
}
