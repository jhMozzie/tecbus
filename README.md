<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Instalacion

Si no tienes composer tienes que hacer lo siguiente

```sh
composer create-project laravel/laravel tecbus
```

#### Instalar Breeze

```sh
composer require laravel/breeze --dev

php artisan breeze:install
```

#### Instalar Livewire

```sh
composer require livewire/livewire
```

#### Instalar Laravel Lang

```sh
composer require --dev laravel-lang/common
php artisan lang:add es
php artisan lang:update
```

Si tienes composer solo tienes que hacer lo siguiente
Laravel new tecbus

-   Escoger breeze
-   Escoger PHPunit
-   Escoger mysql

## Instalar dependencias

##### Breeze

```sh
cd dillinger
npm i
node app
```

Livewire

```sh
composer require livewire/livewire
```

Laravel Lang

```sh
cd dillinger
npm i
node app
```

## Installation

Dillinger requires [Node.js](https://nodejs.org/) v10+ to run.

Install the dependencies and devDependencies and start the server.

```sh
cd dillinger
npm i
node app
```
