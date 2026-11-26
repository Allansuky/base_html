<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $fillable = ['numero_cuenta', 'nombre', 'correo', 'fecha_nacimiento'];
    protected function casts(): array { return ['fecha_nacimiento' => 'date']; }
}
