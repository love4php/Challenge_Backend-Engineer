<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requirement
-  PHP >= 7.4
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Install
- Clone from https://github.com/love4php/Challenge_Backend-Engineer_Mytheresa.git
  - clone https://github.com/love4php/Challenge_Backend-Engineer_Mytheresa.git .
- Run composer install
```bash
   ./composer install
```

## Run API
- in root directory run  : 
 ```bash
php artisan serve
```

- open url [http://127.0.0.1:8000/products] in your browser

## Optional Params
- Fitler by category : http://127.0.0.1:8000/products?category={category_name}
- Fitler by price less than : http://127.0.0.1:8000/products?priceLessThan={price}
- sort product by : http://127.0.0.1:8000/products?sort={property_name}
  - property_name : sku , category , name , price 


## Testing 
To run all tests:
- php artisan test

