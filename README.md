# TvGuideTurkish_web

This repo contains the source code of the website i made mainly for 'What's on TV now' feature. The website was alive between 2014-2017 with various domains.

## Deployment with Docker

You can edit the `.env` file with your desired configuration.

```
# System
DBHOST=db
DBNAME=yayin
DBUSERNAME=test_user
DBPASSWORD=test_pass
ISDEMO='true' # comment this line out if deploying for demo

# Bot
BOTHOST=dataprovider.com
UID=1000 # id -u
GID=1000 # id -g

# Contact
GMAILADDRESS=testuser@gmail.com
GMAILPASSWORD=testuserpass

# Mysql & Phpmyadmin
MYSQL_DATABASE=${DBNAME}
MYSQL_USER=${DBUSERNAME}
MYSQL_PASSWORD=${DBPASSWORD}
MYSQL_ROOT_PASSWORD=test
```

```
# Running the application
docker-compose -f docker-compose.yml --env-file .env up -d

# Running the application with persistent database.
docker-compose -f docker-compose.yml -f make-persistent.yml --env-file .env  up -d
```

## Available Addresses

| Address |  About | Comment  |   |   |
|---|---|---|---|---|
|  ``localhost:8001``  | Main page  |  Main page of the application. Can be changed from the admin panel |   |   |
|  ``localhost:8001/admin`` |  Admin panel | Default credentials are  `admin` `admin`  |   |   |
|  ``localhost:8000`` | Phpmyadmin ui  | Credentials are `root` `test`  |   |   |