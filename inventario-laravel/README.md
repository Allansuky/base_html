# Inventario de productos

Aplicación Laravel con MySQL. Esta primera etapa implementa inicio y cierre de sesión.

Cree una base de datos MySQL llamada `inventario`, copie `.env.example` a `.env` y configure sus credenciales locales. Después ejecute:

```bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

El seeder crea el usuario de práctica `admin` con contraseña `12345678`; el modelo guarda la contraseña como hash. No publique el archivo `.env`.
