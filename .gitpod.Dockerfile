FROM gitpod/workspace-mysql
RUN sudo apt-get remove -y php8.3 && \
    sudo add-apt-repository ppa:ondrej/php && \
    sudo install-packages php8.1 php8.1-bcmath php8.1-curl php8.1-mbstring php8.1-xml && \
    sudo update-alternatives --set php /usr/bin/php8.1