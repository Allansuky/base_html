# Control de tareas

Aplicación Laravel con MySQL y autenticación. Cree una base llamada `tareas`, copie `.env.example` a `.env` y configure la conexión.

```bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

El seeder crea el usuario de práctica `admin` con contraseña `12345678`. La contraseña se almacena como hash. No publique `.env`.
