# NeoSalud - Portal Interno de sistemas del Servicio de Salud Iquique
## Dependencies
- Docker Desktop
- MySql (en el host)

# Instalación 
- ```git clone https://github.com/cl-ssi/neosalud```
- ```cd neosalud```
- ```cp .env-example .env```
- Editar .env para que se conecte a MySql local: DB_HOST=host.docker.internal
- ```docker build -t php8.1-ssi docker/php8.1/.```
- ```docker run --rm -it -v $(pwd):/var/www/html -p 8000:8000 -d --name php8.1-ssi php8.1-ssi```
- ```docker exec -it php8.1-ssi /bin/bash```
- Abrir Docker Desktop, ir a Containers, ejecutar la consola del contenedor php8.1

- ```php artisan key:generate```
- ```php artisan serve --host=0.0.0.0 --port=8000```
- Pudese usar el alias ```$ serve``` para este último comando, ver todos los alias: ```$ alias```

# Navegador
- Navigate to http://localhost:8000

## License

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Developed by Servicio de Salud Iquique.