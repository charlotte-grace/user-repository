FROM nginx:1.10

COPY ./nginx.conf /etc/nginx/conf.d/user_registry.local.conf
