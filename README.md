ARCHIVO README.

1. Clonar proyecto. 

git clone https://github.com/fjo24/app-verifama.git


2. Actualizar composer.

composer update


3. Actualizar archivo ".env", modificando la variable "DB_DATABASE" y agregando la variable "API_KEY_GM" (API_KEY_GM es una KEY de googleMaps creada temporalmente para esta prueba) de la siguiente forma:

DB_DATABASE=verifarma

API_KEY_GM="AIzaSyAm0hXQL3me1jKMxFG_gagNr2VyAvLpDjc"


4. Ejecutar migraciones y seeders. Esto cargara un usuario y algunas farmacias de prueba.

php artisan migrate --seed


5. Usar la documentacion para probar servicios. 

Link de documentacion:
- https://documenter.getpostman.com/view/6308521/Uyr7GdZD  

Servicios:
- Registro.
- Login.
- Creacion de farmacia.
- Obtener farmacia por id.
- Obtener farmacia mas cercana, según coordenadas dadas.


6. Ejecutar tests.

En consola:

vendor/bin/phpunit

Test aplicados:
- Test de creación exitosa de farmacia.
- Test de creación no exitosa de farmacia.
- Test de funcionamiento de calculo de distancia.


Francisco Milano

fjo224@gmail.com
