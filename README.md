# Customer Relationship Management (Server part)
<hr>

## Contents

* [Status](#status)
* [About](#about)
* [Endpoints](#endpoints)
* [Installation and launch](#installation)
  * [In the root](#root)
  * [Inside the Docker](#docker)

### Status <a name="status"></a>

|        Options         |      Value       |
|:----------------------:|:----------------:|
|    **Ready Status**    | _Not full ready_ |
| **Development status** |    _On pause_    |
|      **Interest**      |      _low_       |

### About application <a name="about"></a>

This application is the server part of an entire CRM system that allows you to process requests that have come to endpoints, as well as interact with the database.<br>
The application is implemented with ```laravel 7.24``` and ```php 7.2.5```<br>
Communication with the client part takes place using JSON messages, accepting and validating data fields, and passing data and meta fields back<br>
The application has registration and authorization via a JWT token<br>
The tests in the app are created using phpunit <br>
The application has a faker and a seeder for the database, there is also a mechanism for sending an email message through the ```mailtrap``` sandbox

### implemented endpoints <a name="endpoints"></a>

Endpoint template
* [Request path][Request type][Accepted parameters][Explanation]

For guests:
* /auth/register - [POST][name, email, password, password_confirmation][User registration]
* /auth/login - [POST][email, password][User login]
In both cases, the token is returned, which is needed for further access to the application.

For users:
* [][][]
* [][][]
* [][][]
* [][][]
Route::post('/auth/logout', 'AuthController@logout')->name('auth.logout');
Route::get('/auth/me', 'AuthController@me')->name('auth.me');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::group(["prefix" => "emails"], function () {
Route::get('/', 'EmailController@index')->name('emails.index');
Route::post('/', 'EmailController@create')->name('emails.create');
Route::get('/{email}', 'EmailController@show')->name('emails.show')->middleware('can:show,email');
});

Route::group(["prefix" => "clients"], function () {
Route::get('/', 'ClientController@index')->name('clients.index');
Route::post('/', 'ClientController@create')->name('clients.create');
Route::get('/{client}', 'ClientController@show')->name('clients.show');
Route::post('/{client}', 'ClientController@update')->name('clients.update');
Route::delete('/{client}', 'ClientController@destroy')->name('clients.destroy');
});

### The algorithm for running: <a name="installation"></a>

Docker and Docker-compose are required to run

#### In the root folder <a name="root"></a>

1. Duplicate «.env.example» and rename to «.env»
```
cp .env .env.example 
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

7. Go to the «app» folder in order to duplicate «.new.example» and rename it to «.env» This «.env» file is an environment variable file for the application itself
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
> docker-compose down && docker-compose up --build -d

### Ready to start
