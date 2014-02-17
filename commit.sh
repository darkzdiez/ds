#/bin/bash

git add --all
git commit -a --reset-author -m "commit $(date +%F' '%r)"
git pull
git push

cd system/webgob/
git add --all
git commit -a --reset-author -m "commit $(date +%F' '%r)"
git pull
git push

cd ../ordenes/
git add --all
git commit -a --reset-author -m "commit $(date +%F' '%r)"
git pull
git push

cd ../ihavey/
git add --all
git commit -a --reset-author -m "commit $(date +%F' '%r)"
git pull
git push