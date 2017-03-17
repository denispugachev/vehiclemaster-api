#!/usr/bin/env bash

#== Import script args ==

timezone=$(echo "$1")

#== Bash helpers ==

function info {
  echo " "
  echo "--> $1"
  echo " "
}

#== Provision script ==

info "Provision-script user: `whoami`"

export DEBIAN_FRONTEND=noninteractive

info "Configure timezone"
timedatectl set-timezone ${timezone} --no-ask-password

info "Update OS software"
apt-get update
apt-get upgrade -y

info "Install additional software"
apt-get install -y php7.0-curl php7.0-cli php7.0-intl php7.0-gd php7.0-fpm php7.0-mbstring php7.0-xml php7.0-dev pkg-config unzip nginx mongodb
pecl install mongodb

touch /etc/php/7.0/mods-available/mongodb.ini
echo extension=mongodb.so > /etc/php/7.0/mods-available/mongodb.ini
ln -s /etc/php/7.0/mods-available/mongodb.ini /etc/php/7.0/fpm/conf.d/
ln -s /etc/php/7.0/mods-available/mongodb.ini /etc/php/7.0/cli/conf.d/

info "Configure PHP-FPM"
sed -i 's/user = www-data/user = vagrant/g' /etc/php/7.0/fpm/pool.d/www.conf
sed -i 's/group = www-data/group = vagrant/g' /etc/php/7.0/fpm/pool.d/www.conf
sed -i 's/owner = www-data/owner = vagrant/g' /etc/php/7.0/fpm/pool.d/www.conf
echo "Done!"

info "Configure NGINX"
sed -i 's/user www-data/user vagrant/g' /etc/nginx/nginx.conf
echo "Done!"

info "Enabling site configuration"
ln -s /app/vagrant/nginx/app.conf /etc/nginx/sites-enabled/app.conf
echo "Done!"

info "Install composer"
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer