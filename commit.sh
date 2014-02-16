#/bin/bash

git add --all
git commit -a -m "commit $(date +%F' '%r)"
git pull
git push

cd system/webgob/
git commit -a -m "commit $(date +%F' '%r)"
git pull
git push

cd system/ordenes/
git commit -a -m "commit $(date +%F' '%r)"
git pull
git push

cd system/ihavey/
git commit -a -m "commit $(date +%F' '%r)"
git pull
git push
