#/bin/bash
# var project
read -p 'Ingrese Nombre del Projecto [ds]: ' project
project=${project:-'ds'}
read -p 'Subir al Servidor FTP [Y,n]: ' ftp
read -p 'Procesar Less [Y,n]: ' plessc
read -p "Mensaje [commit $(date +%F' '%r)]:" mensaje
mensaje=${mensaje:-"commit $(date +%F' '%r)"}
echo 'Trabajando...'
if [ "$plessc" = 'y' -o "$plessc" = 'Y' ]; then
	echo "Procesando Less"
	read -p 'LESS: Nombre del Proyecto a Procesar: ' projectless
	sleep 2
	read -p 'LESS: Nombre de la Aplicacion a Procesar [principal]: ' apiless
	apiless=${apiless:-'principal'}
	sleep 2
	lessc system/$projectless/$apiless/public/less/bootstrap.less system/$projectless/$apiless/public/css/styles.css
fi
echo 'Agregando Archivos Locales'
sleep 2
git add --all
echo 'commit Archivos Locales'
sleep 2
git commit -a -m "$mensaje"
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
	git ftp push --user diezsolu --passwd 027pcN9Hnw ftp://diezsoluciones.com/public_html/w
else
    echo "No se Subira al FTP"
    sleep 2
fi
echo 'Finalizado'