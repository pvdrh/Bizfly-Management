## Requirements

- PHP >= 7.4.19

## Usage

1. Clone project.
2. Create .env file, copy content from .env.example to .env file and config in .env:

- Config Database

``` bash
DB_CONNECTION=mongo
DB_HOST=database_server_ip
DB_PORT=27017
DB_DATABASE=database_name
DB_USERNAME=username
DB_PASSWORD=password
```

3. Run

``` bash
$ composer install
$ php artisan key:generate
$ php artisan db:seed
$ php artisan storage:link
$ php artisan route:clear
$ php artisan config:clear
```

4. Local development server

- Run

``` bash
$ php artisan serve
```

- Login with default admin account email: admin@gmail.com and password: 000000
- Login with default employee account email: employee@gmail.com and password: 000000
