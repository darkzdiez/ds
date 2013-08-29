#/bin/bash
# var project
read -p 'Ingrese Nombre del Projecto: ' project
read -p 'Subir al Servidor FTP [Y,n]: ' ftp
read -p 'Mensaje: ' mensaje
echo 'Trabajando...'
echo 'Agregando Archivos Locales'
sleep 2
git add --all
echo 'commit Archivos Locales'
sleep 2
git commit -a -m $mensaje
echo 'Verificando cambios Remotos'
sleep 2
git pull git@github.com:darkzdiez/$project.git
echo 'Enviando cambios'
sleep 2
git push git@github.com:darkzdiez/$project.git
# define ftp remote folder
if [ "$ftp" = 'y' -o "$ftp" = 'Y' ]; then
	echo "Subiendo FTP"
	sleep 2
	git ftp push --user diezsolu --passwd 027pcN9Hnw ftp://diezsoluciones.com/public_html
else
    echo "No se Subira al FTP"
    sleep 2
fi
echo 'Finalizado'