#Vue resource 插件使用

>https://github.com/pagekit/vue-resource

如果不需要太多DOM操作的话，可以使用vue-resource这个插件来请求数据
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
        <script src="https://cdn.bootcss.com/vue/1.0.14/vue.min.js"></script>
        <script src="https://cdn.bootcss.com/vue-resource/0.6.1/vue-resource.min.js"></script>
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

                    this.$http.get('api/tasks', function(data){
                        vm.list = data;
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