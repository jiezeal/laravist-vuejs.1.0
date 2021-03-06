#结合Jquery 实现 Vuejs Ajax

新建一个laravel5.3项目  vue/laravel5.3

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

web.php
```
Route::get('/', function () {
    $tasks = \App\Task::latest()->get();
    return view('welcome', compact('tasks'));
});
```

welcome.blade.php
```
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>My Task</h1>
            <ul class="list-group">
                @foreach($tasks as $task)
                    <li class="list-group-item">
                        {{ $task->body }}
                    </li>
                @endforeach
            </ul>
        </div>

        <script src="https://cdn.bootcss.com/vue/1.0.14/vue.min.js"></script>
    </body>
</html>
```

```
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <tasks-app list="{{ $tasks }}"></tasks-app>
        </div>
        <template id="tasks-template">
            <h1>My Task</h1>
            <ul class="list-group">
                <li class="list-group-item" v-for="task in list">
                    @{{ task.body }}
                </li>
            </ul>
        </template>

        <script src="https://cdn.bootcss.com/vue/1.0.14/vue.min.js"></script>
        <script>
            Vue.component('tasks-app', {
                template: '#tasks-template',
                props: ['list'],
                created: function(){
                    this.list = JSON.parse(this.list);
                }
            });
            
            new Vue({
                el: 'body'
            });
        </script>
    </body>
</html>
```

```
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <tasks-app list="{{ $tasks }}"></tasks-app>
        </div>
        <template id="tasks-template">
            <h1>My Task</h1>
            <ul class="list-group">
                <li class="list-group-item" v-for="task in list">
                    @{{ task.body }}
                    <strong @click="deleteTask(task)">X</strong>
                </li>
            </ul>
        </template>
        <script src="https://cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/vue/1.0.14/vue.min.js"></script>
        <script>
            Vue.component('tasks-app', {
                template: '#tasks-template',
                data: function(){
                    return {
                        list: []
                    }
                },
                created: function(){
                    var vm = this;

                    $.ajax({
                        type: 'get',
                        url: 'api/tasks',
                        dataType: 'json',
                        success: function(response, status, xhr){
                            vm.list = response;
                        }
                    });
                },
                methods: {
                    deleteTask: function(task){
                        this.list.$remove(task);
                    }
                }
            });

            new Vue({
                el: 'body'
            });
        </script>
    </body>
</html>
```