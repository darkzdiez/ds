#/bin/bash

git config --global push.default simple
git add --all
git commit -a --reset-author -m "commit $(date +%F' '%r)"
git pull
git push

cd system/webgob/
git config --global push.default simple
git add --all
git commit -a --reset-author -m "commit $(date +%F' '%r)"
git pull
git push

cd ../ordenes/
git config --global push.default simple
git add --all
git commit -a --reset-author -m "commit $(date +%F' '%r)"
git pull
git push

cd ../ihavey/
git config --global push.default simple
git add --all
git commit -a --reset-author -m "commit $(date +%F' '%r)"
git pull
git push