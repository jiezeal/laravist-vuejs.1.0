#Vue resource 插件稍微深入

php artisan make:controller TaskController --resource

web.php
```
Route::get('/', function () {
    return view('welcome');
});

Route::resource('api/tasks', 'TaskController');
```