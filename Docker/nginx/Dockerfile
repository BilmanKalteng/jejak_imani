FROM nginx:alpine

# Install vim (but Alpine uses 'vim' from busybox by default, this installs the full one)
RUN apk update && \
    apk add vim && \
    rm -rf /var/cache/apk/*

# Copy default config
COPY default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www
