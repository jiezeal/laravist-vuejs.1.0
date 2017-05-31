<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="token" value="{{ csrf_token() }}">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <tasks-app></tasks-app>
        </div>
        <template id="tasks-template">
            <form class="form-group" @submit="createTask">
                <input type="text" class="form-control" v-model="notes">
                <button type="submit" class="btn btn-success btn-block">Create Task</button>
            </form>

            <h1>My Task</h1>
            <ul class="list-group">
                <li class="list-group-item" v-for="task in list | orderBy 'id' -1">
                    @{{ task.body }}
                    <strong @click="deleteTask(task)">X</strong>
                </li>
            </ul>
        </template>
        <script src="https://cdn.bootcss.com/vue/1.0.14/vue.min.js"></script>
        <script src="https://cdn.bootcss.com/vue-resource/0.6.1/vue-resource.min.js"></script>
        <script>
            Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

            var resource = Vue.resource('api/tasks/{id}');

            Vue.component('tasks-app', {
                template: '#tasks-template',
                data: function(){
                    return {
                        notes: '',
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
                        resource.delete({id: task.id}, function (response) {
                            console.log(response);
                        });

                        this.list.$remove(task);
                    },
                    createTask: function(e){
                        e.preventDefault();

                        this.$http.post('api/tasks', {body: this.notes}, function (response) {
                            this.list.push(response.task);
                            this.notes = '';
                            console.log(response);
                        }.bind(this));
                    }
                }
            });

            new Vue({
                el: 'body'
            });
        </script>
    </body>
</html>
