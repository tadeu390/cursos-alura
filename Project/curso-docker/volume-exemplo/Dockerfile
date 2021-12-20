FROM node:latest
LABEL owner="Tadeu"
COPY ./volume-exemplo /var/www
RUN npm install
WORKDIR /var/www
ENTRYPOINT npm start
EXPOSE 3000