FROM node:10-alpine

RUN apk add git

WORKDIR /app

COPY ./package.json ./package.json

RUN npm install --only=prod

COPY ./public ./public
COPY ./src ./src

CMD ["npm", "run", "start:prod"]
EXPOSE 5000
