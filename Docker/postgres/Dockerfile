FROM postgres:15

# Set environment variable untuk password default saat build
ENV POSTGRES_USER=jejak_imani \
    POSTGRES_PASSWORD=jejak_imanijuga \
    POSTGRES_DB=jejak_imani

# Copy custom init SQL (jika ada) ke dalam container
# (Optional)
# COPY ./init.sql /docker-entrypoint-initdb.d/

# Expose port
EXPOSE 5432
