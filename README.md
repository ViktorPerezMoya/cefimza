# CEFI Mendoza

## Instalation

Clone the repo locally:

`git clone https://github.com/ViktorPerezMoya/cefimza.git`

Install PHP dependencies:

`composer install`

Installing Node Dependencies:

`npm install`

Setup configuration

`cp .env.example .env`

Change environment for setup database

```
DB_CONNECTION==
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Generate application key

`php artisan key:generate`

Run database migrations

`php artisan migrate`

Run database seeder

`php artisan db:seed`

Run the dev server (the output will give the address)

`php artisan serve`
