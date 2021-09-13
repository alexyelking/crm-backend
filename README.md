# Customer Relationship Management


### Настройка для локальной разработки:
---------------------------------------
1. Скопировать файл окружения для докер:
> cp .env.example .env
2. Указать свои порты, если надо
3. Запретить гиту отслеживать права:
> git config core.filemode false
4. Сбилдить/запустить докер:
> docker-compose up --build -d
5. Ждать пока композер не отработает своё (в папке vendor должен появиться autoload)
6. Выдать права в корне проекта:
> sudo chmod -R 777 *
7. Скопировать файл окружения для проекта, и засунуть в него настройки для почты:
> cp .env.example .env
8. Залезть внутрь web:
> docker-compose exec web bash
9. Создать ключ для приложения:
> php artisan key:generate
10. Создать ключ для jwt:
> php artisan jwt:secret
11. Запустить миграции и сидеры:
> php artisan migrate --seed
12. Запустить фейк сидеры, по желанию:
> php artisan db:fake
13. Чистим конфиги:
> php artisan config:clear
14. Выйти из web и полностью перезапустить докер:
> docker-compose down && docker-compose up --build -d

###### Настройка завершена.
