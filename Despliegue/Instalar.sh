#!/bin/bash
#
# SCRIPT DE DESPLIEGUE DE PROYECTO
#
#

# Variables de entorno

HOST=$(hostname -I)
WWW="/var/www/html/"

# Copiamos el contenido de la carpeta proyecto a la página html
cp -r ../../PFG/ $WWW

#Doy permiso a todo el directorio
cd $WWW
chmod -R 777 PFG


# Mostramos url de carga
echo "http://$HOST/PFG/instalacion/index.php"


