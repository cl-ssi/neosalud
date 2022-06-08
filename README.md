# Servicio de Salud Iquique
# NeoSalud - Portal Interno de sistemas 
## Dependencias (Windows con WSL2)
- [Instalar WSL2](https://docs.microsoft.com/es-es/windows/wsl/install)
- [Instalar Docker Desktop](https://docs.docker.com/desktop/windows/install)
- MySql (en el host o en un contenedor)
- Instalar Git en WSL2 (ej: ```$ sudo apt-get install git```)
# Instalación 
- Abrir un terminal de WSL (opcional [Instalar Windows Terminal](https://docs.microsoft.com/es-es/windows/terminal/))
- ```git clone https://github.com/cl-ssi/neosalud```
- ```cd neosalud```
- ```cp .env-example .env```
- Configurar los datos de conexión a tu base de datos "unisalud" de tu local en el .env
- ```docker build -t php8.1-ssi docker/php8.1/.```
- ```docker run --rm -it -v $(pwd):/var/www/html -p 8000:8000 -d --name php8.1-ssi php8.1-ssi```
- ```docker exec -it php8.1-ssi /bin/bash```
- Esto abrirá un contenedor con nuestra aplicación
- ```composer install```
- ```php artisan key:generate```
- ```php artisan serve --host=0.0.0.0 --port=8000```
- Pudese usar el alias ```$ serve``` para este último comando, ver todos los alias: ```$ alias```

# Navegador
- Ir a http://localhost:8000

## License
Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Developed by Servicio de Salud Iquique.