composer install

php artisan key:generate

php artisan optimize

php artisan db:seed --class=ProductSeeder

Setup db and copy database credentials to .env file
After thar run - php artisan serve

Products api routes:
http://127.0.0.1:8000/api/products GET
http://127.0.0.1:8000/api/products POST
http://127.0.0.1:8000/api/products/{id} GET
http://127.0.0.1:8000/api/products/{id} PUT
http://127.0.0.1:8000/api/products/{id} DELETE

Cart api routes:
http://127.0.0.1:8000/api/cart GET
http://127.0.0.1:8000/api/removeCart DELETE
http://127.0.0.1:8000/api/remove/{product_id} DELETE
http://127.0.0.1:8000/api/decrease/{product_id} PATCH
http://127.0.0.1:8000/api/add POST


