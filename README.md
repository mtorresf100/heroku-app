# Masivo de Correo

### Requerimientos

* PHP >= 7.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* MySQL >= 5.7.*
* <a href="https://getcomposer.org/">Composer</a>
* [Laravel](https://laravel.com/docs)

Los puntos con simbolo ($) son comandos desde consola

```sh
- $ composer install
```

### Copiar el archivo .env.example (.env.example) y cambiar el nombre a .env y realizar los cambios necesarios

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120

SENDGRID_API_KEY=
```
### Ejecutar proyecto de forma local

```sh
- $ php artisan key:generate
- $ php artisan storage:link
- $ php artisan migrate
- $ php artisan db:seed
- $ php artisan serve
```
### Ejecutar los Queues para envío de correo

```sh
- $ php artisan queue:work

```
