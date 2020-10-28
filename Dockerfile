# Select the base Ubuntu 20.04 image from the Docker Hub Store
FROM ubuntu:20.04

# Set the timezone, this stops PHP libs from attempting to prompt us while setting up the Docker build
ENV TZ=Asia/Kolkata
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install Apache/PHP + libaries/cURL and NPM
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y apache2 && a2enmod rewrite && service apache2 restart
RUN apt-get install -y php7.2 php7.2-mbstring php7.2-xml php7.2-zip php7.2-xdebug php7.2-mysql php7.2-gd php7.2-curl php7.2-sqlite3
RUN apt-get install -y curl
RUN curl -sL https://deb.nodesource.com/setup_12.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN apt-get install -y nodejs

# RUN apt-get install -y libxrender1 libxext6

# RUN echo "error_reporting = E_ALL" >> /etc/php/7.2/cli/conf.d/20-xdebug.ini;
# RUN echo "display_errors = On" >> /etc/php/7.2/cli/conf.d/20-xdebug.ini;
# RUN echo "xdebug.remote_enable=1" >> /etc/php/7.2/cli/conf.d/20-xdebug.ini;

# Download and install composer globally
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Expose the 80 and 443 ports to the outside world
EXPOSE 80

# Change to web dir
WORKDIR /var/www/

# Copy our Laravel directory to the /var/www directory on the Docker image
COPY user-management .

# Copy over the vhost conf file for Apache.
COPY vhost.conf /etc/apache2/sites-enabled/000-default.conf

# RUN composer install
# RUN npm install

# Run Apache in the foreground to stop the Docker container closing
CMD apachectl -D FOREGROUND