# UF2 - Laravel8 Exam 02
## Inicializar proyecto
Utiliza Docker para cargar todo el proyecto empezar a funcionar

- Instalamos sail en el nuevo proyecto
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
- Iniciamos el proyecto: ./vendor/bin/sail up -d
- Web: **http://localhost**


## Alquiler de peliculas

![Pagina Principal](https://github.codocker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqsdocker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqsm/dantriano/m7-laravel-exam-02/blob/main/public/img/screen01.png)

- Queremos crear un sistema de alquiler de peliculas
- Las peliculas se pueden alquilar o comprar
- Solo puedes alquilar/comprar 3 peliculas en una misma operación de compra
- Alquilar una pelicula cuesta 5€
- Comprar una pelicula depende del precio asociado a cada pelicula en la base de datos

## Base de datos

Se debe iniciar con una migración que importe los siguientes datos y estructura a la base de datos.

### Tabla users

| id | name | email | created_at | updated_at |
| --- | --- | --- | --- | --- |
| 1  | Pedro  | pedro@student.com | null | null |
| 2  | Sara  | sara@student.com | null | null |

### Tabla movies

| id | name | category | descripcion | rating | stock | price | image | created_at | updated_at |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| 1  | El señor de los anillos  | 1 | Algo de un anillo | 4 | 7 | 10.10 | img01.jpg | null | null |
| 2  | Ironman  | 2 | Un tio con mucha pasta | 4 | 1 | 5.00 | img02.jpg | null | null |
| 3  | Passengers  | 3 | Una nave espacial | 2 | 3 | 1.00 | img03.jpg | null | null |
| 4  | V de Vendetta  | 2 | Venganza | 2 | 3 | 1.00 | img04.jpg | null | null |

### Categories

| id | name |
| --- | --- |
| 1  | Fantasia  |
| 2  | Acción  |
| 3  | Romance  |

## Filtros

En la pagina principal se pueden aplicar filtros para reducir la lista de peliculas.
 - Filtrar por genero: Muestra las peliculas cuya categoria coincide con el botón de **Genero** pulsado por el usuario
 - Filtrar por titulo: Con el campo de texto se puede buscar una pelicula por su nombre. IMPORTANTE! Si antes el usuario ha buscado un genero, la busqueda del titulo seré sobre el genero actual.
 ![Filtros de busqueda](https://github.com/dantriano/m7-laravel-exam-02/blob/main/public/img/screen04.png)


## Proceso de compra

- Tanto alquilar como comprar forman parte del mismo proceso
- Al comprar/alquilar un elemento, se añade al carrito de la compra (arriba a la derecha de la pantalla) sin que se recargue la página.
- Se puede vaciar el carrito de compra
- Solo pueden haber 3 elementos en el carrito
- Los elementos del carrito se guardan en **session**
- Una vez haces click en **finalizar compra** se inicia el siguiente proceso:


1. Resumen: Donde se visualiza el lista de los productos junto con el precio final. Debe aparecer si se alquila o se compra.
 ![Resumen de compra/alquiler](https://github.com/dantriano/m7-laravel-exam-02/blob/main/public/img/screen02.png)

2. Formulario de Envio: Los datos de Nombre y email proceden del usuario a traves de la base de datos. La ID del usuario esta siempre en sessión. El formulario debe comprobar que el usuario introduce **todos** los campos
 ![Formularios de compra](https://github.com/dantriano/m7-laravel-exam-02/blob/main/public/img/screen03.png)

3. Confirmar compra. Se visualiza un resumen final de la compra con los datos de envio para confirmar el proceso

## Guarda estado de compra
 - Se guarda en sesión el paso en el que te encuentras. Por ejemplo si estas en el formulario de envio (paso 2) y vas al home, cuando vuelves a pulsar **Finalizar compra** el sistema te devuelve al paso **2. Formulario de envio**
- Este estado se resetea en el momento que añades un nuevo producto al carrito o lo vacias
