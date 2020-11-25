# SharePost

## About

SharePost is a practice application showcasing the [Bjornstad-MVC](https://github.com/Kodriboh/Bjornstad-MVC-Bootstrap) framework.
This is a very basic example project used as a proof of concept to show Bjornstad
in a project in its working state.

Please note: Bjornstad is a small MVC framework and should not be used for real-world projects
in it's current state.

## Getting started

To make things easier Bjornstad comes with a ready made set of containers (Please see dependencies).

First of all you will need to [install docker](https://docs.docker.com/get-docker/). 

Secondly, you will need to create a .env file in the root folder, adding in database requirements from the docker-compose file.
e.g. MYSQL_PASSWORD=password

Next, you will need to create a .env within the src folder, following the format of the .env.example provided.

You may then bring up your containers using: `docker-compose up --build -d`

Lastly you will need to install the dependencies via composer: `composer require vlucas/phpdotenv`

Please note that the php container has composer installed, if you do not have composer installed locally you can
exec into the php container to install dependencies `docker exec -ti php sh`

## Dependencies

- **Docker**
- **dotenv**
- **mysql**
- **PDO**

Bjornstad was built using docker WSL2 on a Windows 10 PC. 

## To Run This Project

> Clone this repository

> cd into the project root

> set .env variables (see .env.example)

> cd into src

> set .env variables (see .env.example)

> cd back into root

> run: docker-compose up --build -d

Note: As of MYSQL 5.7 docker-compose volumes no longer work when instantiating databases, as such, to run this project you will need to manually
create the database. Future larger projects will use a workaround to this issue.

> Open in browser: localhost:5000

> login to phpmyadmin

> create a database (name same as .env DB_NAME)

> create the following tables:

<pre>
    <code>
        CREATE TABLE users (
            id INT PRIMARY KEY NOT NULL, 
            name VARCHAR(255) NOT NULL, 
            email VARCHAR(255) NOT NULL, 
            password VARCHAR(255) NOT NULL, 
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
        );

        CREATE TABLE posts (
            id INT PRIMARY KEY NOT NULL, 
            user_id INT NOT NULL, 
            title VARCHAR(255) NOT NULL, 
            body TEXT NOT NULL, 
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
        );
    </code>
</pre>
