<div align="center">
  <img src="icon/crm-icon.png" width="150" height="150" alt="SPA">
</div>

# Customer Relationship Management (Server part)

## Contents

* [Status](#status)
* [About](#about)
* [Endpoints](#endpoints)
* [Installation and launch](#installation)
    * [In the root](#root)
    * [Inside the Docker](#docker)

<hr>

### Status <a name="status"></a>

|               Options               |      Value       |
|:-----------------------------------:|:----------------:|
|      **Project ready Status**       | _Not full ready_ |
|       **Development status**        |    _On pause_    |
| **Interest in further development** |      _low_       |

<hr>

### About application <a name="about"></a>

This application is the server part of an entire CRM system that allows you to process requests that have come to
endpoints, as well as interact with the database.<br>
The application is implemented with ```laravel 7.24``` and ```php 7.2.5```<br>
Communication with the client part takes place using JSON messages, accepting and validating data fields, and passing
data and meta fields back<br>
The application has registration and authorization via a JWT token<br>
The tests in the app are created using phpunit <br>
The application has a faker and a seeder for the database, there is also a mechanism for sending an email message
through the ```mailtrap``` sandbox
<hr>

### Implemented endpoints <a name="endpoints"></a>

**In both cases, a JWT token is returned, which is needed for further access to the application:**

|        Path        | Method |                  Parameters                  |    Explanation    |
|:------------------:|:------:|:--------------------------------------------:|:-----------------:|
| /api/auth/register |  POST  | name, email, password, password_confirmation | User registration |
|  /api/auth/login   |  POST  |               email, password                |    User login     |

For users:

| Global path  |     Path     | Method |        Parameters         |      Explanation      |
|:------------:|:------------:|:------:|:-------------------------:|:---------------------:|
|     /api     | /auth/logout |  POST  |           token           |      User logout      |
|     /api     |   /auth/me   |  GET   |           token           |   User information    |
|     /api     |  /dashboard  |  GET   |           token           | Dashboard information |
| /api/emails  |      /       |  GET   |           token           |  Emails index (list)  |
| /api/emails  |      /       |  POST  |      body, to, token      |     Email create      |
| /api/emails  |   /{email}   |  GET   |           token           |      Email show       |
| /api/clients |      /       |  GET   |           token           | Clients index (list)  |
| /api/clients |      /       |  POST  | name, email, phone, token |     Client create     |
| /api/clients |  /{client}   |  GET   |           token           |      Client show      |
| /api/clients |  /{client}   |  POST  |  name/email/phone, token  |     Client update     |
| /api/clients |  /{client}   | DELETE |           token           |     Client delete     |

<hr>

### The algorithm for running: <a name="installation"></a>

Docker and Docker-compose are required to run

#### In the root folder <a name="root"></a>

1. Duplicate «.env.example» and rename to «.env»

```
cp .env.example .env
```

2. Specify a free port for «MYSQL» and «APACHE2», or leave the one that has already been installed

3. Git config core file mode must be false

```
git config core.filemode false
```

4. Launch Docker-compose

```
docker-compose up --build -d
```

5. Wait for composer to finish working (the «autoload» file will appear in the «vendor» folder)

6. Grant rights for convenience in the root of the project

```
sudo chmod -R 777 *
```

7. Go to the «app» folder in order to duplicate «.env.example» and rename it to «.env» This «.env» file is an
   environment variable file for the application itself

```
cp .env.example .env
```

8. In the root folder of the project, you need to go inside Docker for further configuration

```
docker-compose exec web bash
```

#### Inside the Docker <a name="docker"></a>

9. Generate an application key

```
php artisan key:generate
```

10. Generate a JWT key

```
php artisan jwt:secret
```

11. Start the migration process and seeder

```
php artisan migrate --seed
```

12. Launch the faker

```
php artisan db:fake
```

13. Clear the trash

```
php artisan config:clear
```

14. Exit Docker (web) with the
    ```exit``` command, and completely restart Docker

```
docker-compose down && docker-compose up --build -d
```

<hr>

### Ready to start
