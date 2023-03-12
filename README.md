## Установка всех зависимостей

Перед установкой зависимостей убедитесь, что на вашем компьютере установлены необходимые для работы проекта программы и инструменты. Обычно это Git, Node.js, Composer и PHP. После этого переходите к установке зависимостей через командную строку.

-   `php artisan migrate` - запускает миграции базы данных, создавая необходимые таблицы и поля в базе данных для Laravel-приложения.
-   `npm run dev / npm run watch` - сборка фронтенд-части проекта с помощью webpack. `npm run dev` создает сборку один раз, `npm run watch` следит за изменениями в файлах и автоматически создает новую сборку.
-   `composer install` - устанавливает все зависимости PHP-проекта, указанные в файле composer.json.
-   `npm install` - устанавливает все зависимости фронтенд-проекта, указанные в файле package.json
-   `npm run watch` - запускает webpack-dev-server, который следит за изменениями в файлах и автоматически создает новую сборку фронтенд-части приложения.
-   `php artisan serve` - запускает веб-сервер PHP, который будет обрабатывать запросы к вашему Laravel-приложению.

## Изменить файл config для подключения к БД
![](https://github.com/MishynMykhailo/Laravel-book-library/blob/main/readmeImages/configSetting.jpg)
## Демонстрация
![](https://github.com/MishynMykhailo/Laravel-book-library/blob/250bf6eecfa6942f3e016c92e952fef698fdf277/readmeImages/allAuthor.jpg)
![](https://github.com/MishynMykhailo/Laravel-book-library/blob/250bf6eecfa6942f3e016c92e952fef698fdf277/readmeImages/authorCreate.jpg)
