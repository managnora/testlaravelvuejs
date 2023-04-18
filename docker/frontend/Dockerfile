FROM node:18

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
COPY package.json ./

RUN apt-get update \
    && apt-get install -y \
    libpng-dev \
    build-essential \
    make

RUN npm install

RUN npm install -g n

RUN mkdir /home/node/.ssh

# Bundle app source
COPY . .

EXPOSE 3000
CMD [ "node", "server.js" ]
