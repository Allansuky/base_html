# Catálogo de libros

Primer ejercicio de CRUD en Laravel. Usa Blade, Eloquent y MySQL.

## Ejecutar en Windows

Crea una base de datos MySQL vacía llamada `biblioteca`. Desde esta carpeta, ejecuta:

```powershell
composer install
Copy-Item .env.example .env
```

Ajusta `DB_HOST`, `DB_PORT`, `DB_USERNAME` y `DB_PASSWORD` en `.env` según tu instalación. PHP necesita la extensión `pdo_mysql`.

```powershell
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Abre http://127.0.0.1:8000 e inicia sesión con el usuario `admin` y la contraseña de práctica `12345678`.

## Pruebas

`php artisan test` ejecuta las pruebas con SQLite en memoria.
