FROM gitpod/workspace-mysql
RUN sudo add-apt-repository ppa:ondrej/php && \
    sudo install-packages php8.1 php-bcmath php-curl php-json php-mbstring php-xml