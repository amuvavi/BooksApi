<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:



## Clone the repository
```
git clone https://github.com/amuvavi/BooksApi.git
```
## Add .env file withthe following credentials
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=XXXXXXXXXXXXXXXXXXXXXXXXXXXX 
APP_DEBUG=true
APP_URL=http://localhost
LOG_CHANNEL=slack
LOG_LEVEL=debug
DB_CONNECTION=sqlite
DB_DATABASE=database/database.local.sqlite
DYNAMODB_CONNECTION=local
DYNAMODB_LOCAL_ENDPOINT=your_local_endpoint
SESSION_DRIVER=array

```

### Run Migrations
```
Run -php artisan migrate- for your local DynamoDb databse
```
```
php artisan --env dev migrate for your remote database
```



## Seed The Databse
```
php artisan db:seed  # for the local DynamoDB
php artisan --env dev db:seed  # for DynamoDB in AWS
```
## Using Local Dynamo Db
```
php -S localhost:8001 -t public
```
## Preparing to Deploy to Aws Lambda
```
composer install --prefer-dist --optimize-autoloader --no-dev

php artisan config:clear

serverless deploy
```
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
