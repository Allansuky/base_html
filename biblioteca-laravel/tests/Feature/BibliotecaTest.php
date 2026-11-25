<?php

namespace Tests\Feature;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class BibliotecaTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_and_logout_protect_the_catalog(): void
    {
        $this->seed();
        $this->assertTrue(Hash::check('12345678', User::where('username', 'admin')->firstOrFail()->password));
        $this->assertDatabaseCount('libros', 10);

        $this->get('/libros')->assertRedirect('/login');
        $this->post('/libros')->assertRedirect('/login');
        $this->post('/login', ['username' => 'admin', 'password' => 'incorrecta'])
            ->assertSessionHasErrors('username');
        $this->post('/login', ['username' => 'admin', 'password' => '12345678'])
            ->assertRedirect('/libros');
        $this->get('/libros')->assertOk()->assertSee('LIB-DEMO-001');
        $this->post('/logout')->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_catalog_validates_and_persists_crud_operations(): void
    {
        $this->actingAs(User::create(['username' => 'admin', 'password' => '12345678']));
        $this->get('/libros')->assertSee('Todavía no hay libros registrados.');
        $this->get('/libros/create')->assertOk()->assertSee('Registrar libro');

        $datos = [
            'codigo' => 'LIB-TEST',
            'titulo' => 'Atlas del bosque',
            'autor' => 'Ana Torres',
            'anio_publicacion' => 2020,
        ];

        $this->post('/libros', $datos)->assertRedirect('/libros')->assertSessionHas('estado');
        $libro = Libro::sole();
        $this->get("/libros/{$libro->id}/edit")->assertOk()->assertSee('Atlas del bosque');

        $editado = array_replace($datos, ['titulo' => 'Atlas del bosque revisado']);
        $this->put("/libros/{$libro->id}", $editado)->assertRedirect('/libros')->assertSessionHas('estado');
        $this->assertDatabaseHas('libros', ['id' => $libro->id, 'titulo' => $editado['titulo']]);

        $this->from('/libros/create')->post('/libros', $datos)
            ->assertRedirect('/libros/create')->assertSessionHasErrors('codigo')
            ->assertSessionHasInput('titulo', $datos['titulo']);

        $this->post('/libros', array_replace($datos, [
            'codigo' => 'LIB-FUTURO',
            'anio_publicacion' => now()->year + 1,
        ]))->assertSessionHasErrors('anio_publicacion');

        $otro = Libro::factory()->create();
        $this->put("/libros/{$libro->id}", array_replace($editado, ['codigo' => $otro->codigo]))
            ->assertSessionHasErrors('codigo');

        $this->delete("/libros/{$libro->id}")->assertRedirect('/libros')->assertSessionHas('estado');
        $this->assertModelMissing($libro);
        $this->assertModelExists($otro);
    }
}
