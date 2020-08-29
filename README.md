# Локальная разработка через docker-compose

### Настройка и старт докера:

1. Скопируй ```.env.example``` в ```.env```
2. Укажи порты, которые у тебя свободны. Либо оставь эти. 
3. Сбилди и запусти докер-композ ```(docker-compose up --build -d)```

Докер готов.

### Настройка проекта

1. Скопируй ```.env.example``` в ```.env```
2. Зайди в web (```docker-compose exec web bash```)
3. Cоздаq ключ (```php artisan key:generate```)
4. Сделай миграции (```php artisan migrate```)
5. По желанию можно запустить сидеры (```php artisan db:seed```)