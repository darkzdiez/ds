#/bin/bash
# var project
read -p 'Ingrese Nombre del Projecto: ' project
read -p 'Subir al Servidor FTP[0:NO, 1:SI]: ' ftp
read -p 'Mensaje: ' mensaje
echo 'Trabajando...'
echo 'Agregando Archivos Locales'
git add --all
echo 'commit Archivos Locales'
git commit -a -m $mensaje

git pull git@github.com:darkzdiez/$project.git

git push git@github.com:darkzdiez/$project.git
# define ftp remote folder
if [ ftp=='1' ]; then
	git ftp push --user diezsolu --passwd 027pcN9Hnw ftp://diezsoluciones.com/public_html
fi
echo 'Finalizado'