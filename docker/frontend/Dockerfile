FROM ubuntu:22.04

RUN apt-get update && apt-get -y install curl \
&& curl -sL https://deb.nodesource.com/setup_18.x | bash - \
&& apt-get install -y nodejs

# Install yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
&& echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
&& apt-get update && apt-get install yarn=1.7.0-1

# Install bzip2
RUN apt-get update && apt-get install bzip2 && apt-get -y install libfontconfig

# Add user yarn for cache dir
RUN groupadd -g 1000 yarn \
&& useradd -u 1000 -g yarn -d /home/yarn -m yarn \
&& mkdir /home/yarn/.cache /home/yarn/.cache/yarn \
&& chown -R yarn:yarn /home/yarn/.cache

# Expose port 8080
EXPOSE 8080

CMD ["yarn", "run", "dev"]
