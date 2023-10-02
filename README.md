Sistema de Roles y Permisos Basico
Realizado con:
Laravel 10
Laravel UI
Laravelcollective HTML
Maatwebsite Excel
Spatie Laravel Permission
Yajra Laravel DataTables
Popperjs core
Bootstrap 5.2.3
Laravel datatables-vite
Laravel Vite
FontAwesome 6.4.0

Configuración de certificado local para que se trabaje con ssl, los archivos estan en la carpeta ctr ya generados para esta configuracion

Se le agrega esta linea al segundo archivo en caso de que de error 

cd %~dp0

https://datogedon.com/wordpress/como-crear-ssl-valido-en-localhost-para-xampp-red-local/

Configuracion con XAMPP en ambiente local en windows:

## laboratorio.com.ve
 <VirtualHost *:80>
     DocumentRoot "C:\xampp\htdocs\laboratorio\public"
     ServerName laboratorio.com.ve
     ServerAlias *.laboratorio.com.ve
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:\xampp\htdocs\laboratorio\public"
     ServerName laboratorio.com.ve
     ServerAlias *.laboratorio.com.ve
     SSLEngine on
     SSLCertificateFile "crt/laboratorio.com.ve/server.crt"
     SSLCertificateKeyFile "crt/laboratorio.com.ve/server.key"
 </VirtualHost>