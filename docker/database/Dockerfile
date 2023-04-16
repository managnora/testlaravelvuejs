FROM ubuntu:16.04

RUN apt-get update && apt-get install -y ca-certificates

# Install postgresql
COPY pgdg.list /etc/apt/sources.list.d
COPY ACCC4CF8.asc /tmp
RUN cat /tmp/ACCC4CF8.asc | apt-key add -
RUN apt-get update && apt-get upgrade -y && apt-get install -y postgresql-9.6

# Run the rest of the commands as the postgres user
USER postgres

# Create a PostgreSQL role named ``docker`` with ``docker`` as the password and
# then create a database `docker` owned by the ``docker`` role.
# Note: here we use ``&&\`` to run commands one after the other - the ``\``
#       allows the RUN command to span multiple lines.
RUN    /etc/init.d/postgresql start &&\
    psql --command "CREATE USER docker WITH SUPERUSER PASSWORD 'root';"

# Adjust PostgreSQL configuration so that remote connections to the database are possible.
RUN echo "host all  all    0.0.0.0/0  md5" >> /etc/postgresql/9.6/main/pg_hba.conf

# And add ``listen_addresses`` to ``/etc/postgresql/9.6/main/postgresql.conf``
RUN echo "listen_addresses='*'" >> /etc/postgresql/9.6/main/postgresql.conf

# Expose port 5432
EXPOSE 5432

# Set the default command to run when starting the container
CMD ["/usr/lib/postgresql/9.6/bin/postgres", "-D", "/var/lib/postgresql/9.6/main", "-c", "config_file=/etc/postgresql/9.6/main/postgresql.conf"]