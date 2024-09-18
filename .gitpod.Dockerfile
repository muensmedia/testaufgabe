FROM gitpod/workspace-mysql
RUN sudo install-packages php8.3 php8.3-bcmath php8.3-curl php8.3-mbstring php8.3-xml && \
    sudo update-alternatives --set php /usr/bin/php8.3