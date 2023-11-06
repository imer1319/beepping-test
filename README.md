# Prueba Técnica Beeping

Este repositorio contiene una solución para la prueba técnica de Beeping. La prueba consiste en crear un proyecto en Laravel 8, configurar una base de datos, realizar cálculos de costos de órdenes y mostrar un listado de órdenes en una tabla utilizando Livewire.

## Tareas Realizadas

A continuación, se enumeran las tareas completadas en este proyecto:

1. **Instalación de Laravel 8 y Livewire:** El proyecto se ha creado utilizando Laravel 8 y se ha instalado Livewire como componente adicional.

2. **Migraciones:** Se han creado migraciones para definir la estructura de las tablas `orders`, `orders_lines`, y `products`.

3. **Añadir Registros:** Se han añadido registros a la base de datos, incluyendo 20 registros de "orders" con sus "lines" y 10 de "products".

4. **Cálculo del Coste Total:** Se ha creado un comando personalizado en Laravel que calcula el coste total de todas las órdenes en la base de datos mediante una consulta Eloquent. Esta consulta se ejecuta de forma asíncrona a través de un JOB de Laravel y muestra el resultado en la terminal.

5. **Frontend con Livewire:** Se ha creado una vista Livewire que muestra un listado de todas las órdenes en una tabla, incluyendo las columnas de `order_ref`, `customer_name`, y `total qty`.

6. **Configuración del .env:** En el archivo `.env`, se proporciona una configuración principal necesaria para replicar el proyecto.

## Cómo Usar

1. Clona este repositorio en tu entorno de desarrollo:

2. Configura tu archivo `.env` siguiendo las instrucciones proporcionadas.
    ya esta modificado por defecto la `QUEUE_CONNECTION=database` para trabajar con el job
3. Ejecuta las migraciones para crear la estructura de la base de datos y el llenado de la misma:
    `php artisan migrate`
    `php artisan db:seed --class=OrderSeeder`
4. Ejecuta el comando de cálculo de coste total:
    ir hacia la ruta `/calcular-coste`, y enciende el worker con el comando
    `php artisan queue:work`
5. Abre el proyecto en tu navegador y explora la lista de órdenes.
