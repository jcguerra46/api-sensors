# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)


# API Sensors Technical Test

API Restful de sensores que seran colocados en una mesa, los cuales pueden dar su localización exacta por medio de un
endpoint de sensores cercanos, que a partir de la ubicación de un sensor, pueda listar los sensores mas cercanos a él
ordenados de los mas cercas a mas distantes y filtrarlo haciendo que muestre un numero especifico de sensores cercanos 
y/o que muestre los sensores que esten a una distancia determinada.

Adicionalmente se hizo un CRUD, donde se puede listar, crear, mostrar, actualizar y eliminar los puntos de ubicación 
de los sensores. 

Para esta prueba técnica se utilizó: 

  - Lumen, Micro-Framework de Laravel
  - Docker
  - Docker-Compose
  - Swagger Documnetation
  - PHPUnit Testing
  - PostgreSQL
  - Git
  
   ---
## Instalacion
 ---
``` bash
 # 1.- Para la instalación de esta API desde el terminal, debe clonar este repositorio y copiar las variables de entorno:
 
 $ git clone https://bitbucket.org/jcguerra46/api-sensors.git 

 $ cd api-sensors 

 $ cp .env.example .env 
```
 ---
 2.- Levantar los servicios de Docker con el siguiente comando:
 
** $ docker-compose up **

Se levantarán las instancias del servidor PHP nginx y 2 bases de datos PostgreSQL, una para la App "api_sensors" y otra para los test "api_sensors_test".

  ---
 3.- Se debe entrar al contenedor de Docker para instalar las dependencias de la aplicación, asi como tambien ejecutar la migración y el seeder:
 
** $ docker-compose exec api-sensors sh **

** $ composer install **

** $ php artisan migrate:refresh --seed **

  ---
## Swagger API Documentation
  ---
 
  Se debe generar el archivo para la documentación de la API dentro del contenedor del Docker y asi poder ver los endpoints y probarlos desde el navegador web

** $ php artisan swagger-lume:generate **

 Luego de generar el archivo api-docs.json, por defecto la documentación de la API se visualiza en
  [http://localhost/api/documentation](http://localhost/api/documentation).
 
 A modo informativo se muestran los endpoints de API-Sensors:
 
 | Método | URL | Descripción |
 | ------ | ------ | ------ |
 | GET | localhost/sensors | Retorna listado de sensores paginado |
 | POST | localhost/sensors | Almacena un nuevo sensor |
 | GET | localhost/sensors/{id} | Muestra un sensor existente |
 | PUT | localhost/sensors/{id} | Modifica un sensor existente |
 | DELETE | localhost/sensors/{id} | Elimina un sensor existente |
 | GET | localhost/sensors/{id}/nearby | Retorna listado de sensores cercanos |

  ---
## Test
  ---
 
 Para ejecutar el test de la aplicación se debe ejecutar desde dentro del contenedor de Docker con el siguiente comando:
 
** $ ./vendor/bin/phpunit **

 Ejecutar solo un método del test:

** $ ./vendor/bin/phpunit tests/SensorsTest.php --filter=can_create_a_sensor  **

  ---
## Permisos
  ---

  Si tiene necesidad de cambiar permisos al storage, se puede hacer con el siguiente comando:
  
** $ chmod 777 -R /var/www/html/storage/ **




  ---
# About Lumen PHP Framework
 ---

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
