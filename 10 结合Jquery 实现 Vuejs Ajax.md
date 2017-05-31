#结合Jquery 实现 Vuejs Ajax

php artisan make:model Task -m

2017_05_31_012015_create_tasks_table.php
```
public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->increments('id');
        $table->text('body');
        $table->boolean('completed')->default(0);
        $table->timestamps();
    });
}
```

database/factories/ModelFactory.php
```
$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph
    ];
});
```

php artisan migrate
php artisan tinker
factory('App\Task', 20)->create()

