ARCHIVO README.

1. Clonar proyecto. 

git clone https://github.com/fjo24/app-verifarma.git


2. Dentro de directorio de app-verifarma actualizar composer.

composer update


3. Crear archivo ".env", copiando data de ".env.example", seguidamente modificar la variable "DB_DATABASE" y agregar la variable "API_KEY_GM" (API_KEY_GM es una KEY de googleMaps creada temporalmente para esta prueba) de la siguiente forma:

DB_DATABASE=verifarma

API_KEY_GM="AIzaSyAm0hXQL3me1jKMxFG_gagNr2VyAvLpDjc"


4. Generar Key de la APP. 

php artisan key:generate


5. Ejecutar migraciones y seeders. Esto cargara un usuario y algunas farmacias de prueba.

php artisan migrate --seed


6. Iniciar aplicacion.

php artisan serve


7. Usar la documentacion para probar servicios. 

Link de documentacion:
- https://documenter.getpostman.com/view/6308521/Uyr7GdZD  

Servicios:
- Registro. 
- Login. Obtenemos token necesario para el resto de los servicios.
- Creacion de farmacia. Enviar "Authorization bearer token".
- Obtener farmacia por id. Enviar "Authorization bearer token".
- Obtener farmacia mas cercana, según coordenadas dadas. Enviar "Authorization bearer token".


8. Ejecutar tests.

En consola:

vendor/bin/phpunit

Test aplicados:
- Test de creación exitosa de farmacia.
- Test de creación no exitosa de farmacia.
- Test de funcionamiento de calculo de distancia.


Francisco Milano

fjo224@gmail.com
