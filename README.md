####默认队列
```php
php artisan queue:work --queue=workflow
```
####导出队列 
```php
$queue = config('app.name').'-excel';

php artisan queue:work --queue=$queue
```

####回调队列
```php
$queue = config('app.name').'-callback';

php artisan queue:work --queue=$queue
```
####广播队列 queue=broadcast
```php
$queue = config('app.name').'-broadcast';

php artisan queue:work --queue=$queue
```
