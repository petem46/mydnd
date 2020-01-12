curl -sS https://getcomposer.org/installer | /usr/bin/php7.3-cli

/usr/bin/php7.3-cli composer.phar selfupdate
/usr/bin/php7.3-cli composer.phar install
/usr/bin/php7.3-cli composer.phar update


echo 'export PATH=$HOME/local/bin:$PATH' >> ~/.bashrc
. ~/.bashrc
mkdir ~/local
mkdir ~/node-latest-install
cd ~/node-latest-install
curl http://nodejs.org/dist/node-latest.tar.gz | /usr/bin/nodejs
/usr/bin/nodejs npm
