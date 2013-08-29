#/bin/bash
# var project
echo 'Ingrese Nombre del Projecto'
read project;

echo 'Trabajando...'
git add --all

git commit -a -m 'git.sh'

git pull git@github.com:darkzdiez/$(project).git

git push git@github.com:darkzdiez/$(project).git
# define ftp remote folder
git ftp push --user diezsolu --passwd 027pcN9Hnw ftp://diezsoluciones.com/public_html
echo 'Finalizado'