#!/bin/bash

sudo apt-get update -y
sudo apt-get install apache2 php libapache2-mod-php7.0 php-xml php-simplexml php-gd php-mysql zip unzip -y
sudo mv vendor/ /var/www/html/
sudo service apache2 restart
cd /var/www/html
ssh-keygen -t rsa -b 4096 -C kphadatare@github.com:illinoistech-itm/kphadatare.git
sudo git clone https://kphadatare:Hello135@github.com/illinoistech-itm/kphadatare.git
sudo mv kphadatare/ITMO-544/mp1/Web\ pages/* /var/www/html
sudo rm -rf kphadatare
sudo mkdir /tmp_grayscale
sudo chmod 777 /tmp_grayscale
cd ~
export COMPOSER_HOME=/root && /usr/bin/composer.phar self-update 1.0.0-alpha11
curl -sS https://getcomposer.org/installer | php
export COMPOSER_HOME=/root && /usr/bin/composer.phar self-update 1.0.0-alpha11
php composer.phar require aws/aws-sdk-php
sudo cp -ar  ~/vendor /var/www/html
sudo cp -ar /root/vendor /var/www/html
sudo setfacl -m u:www-data:rwx /home/ubuntu
curl -sS https://getcomposer.org/installer | php