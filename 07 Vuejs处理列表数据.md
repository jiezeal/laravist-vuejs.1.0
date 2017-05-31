#Vuejs处理列表数据

v-for小实例  vue/09.v-for.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
    ul{ list-style: none; }
    button{ border: none; padding: 5px; color: #FFF; }
</style>

<div id="app">
    <ul>
        <li v-for="task in tasks">{{ task }}</li>
    </ul>
</div>

<script src="vue.js"></script>
<script>
    new Vue({
        el: "#app",
        data: {
            tasks: [
                'go to the movie',
                'learn vue js in action',
                'go to the shop'
            ]
        }
    });
</script>
```

:class小实例  vue/10.class.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
    ul{ list-style: none; }
    button{ border: none; padding: 5px; color: #FFF; }
    .completed{ text-decoration: line-through; }
</style>

<div id="app">
    <ul>
        <li :class="task.completed ? 'completed' : ''" v-for="task in tasks">{{ task.body }}</li>
    </ul>
</div>

<script src="vue.js"></script>
<script>
    new Vue({
        el: "#app",
        data: {
            tasks: [
                {body:'go to the movie', completed:false},
                {body:'learn vue js in action', completed:true},
                {body:'go to the shop', completed:false}
            ]
        }
    });
</script>
```
或
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
    ul{ list-style: none; }
    button{ border: none; padding: 5px; color: #FFF; }
    .completed{ text-decoration: line-through; }
</style>

<div id="app">
    <ul>
        <li :class="['truely', 'sun', task.completed ? 'completed' : '']" v-for="task in tasks">{{ task.body }}</li>
    </ul>
</div>

<script src="vue.js"></script>
<script>
    new Vue({
        el: "#app",
        data: {
            tasks: [
                {body:'go to the movie', completed:false},
                {body:'learn vue js in action', completed:true},
                {body:'go to the shop', completed:false}
            ]
        }
    });
</script>
```
或
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
    ul{ list-style: none; }
    button{ border: none; padding: 5px; color: #FFF; }
    .completed{ text-decoration: line-through; }
</style>

<div id="app">
    <ul>
        <li :class="{'completed':task.completed}" v-for="task in tasks">{{ task.body }}</li>
    </ul>
</div>

<script src="vue.js"></script>
<script>
    new Vue({
        el: "#app",
        data: {
            tasks: [
                {body:'go to the movie', completed:false},
                {body:'learn vue js in action', completed:true},
                {body:'go to the shop', completed:false}
            ]
        }
    });
</script>
```

简单版todo应用  vue/11.sample-todo.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
    ul{ list-style: none; }
    button{ border: none; padding: 5px; color: #FFF; }
    .completed{ text-decoration: line-through; }
</style>

<div id="app">
    <ul>
        <li v-on:click="toggleTasks(task)" :class="{'completed':task.completed}" v-for="task in tasks">{{ task.body }}</li>
    </ul>
</div>

<script src="vue.js"></script>
<script>
    new Vue({
        el: "#app",
        data: {
            tasks: [
                {body:'go to the movie', completed:false},
                {body:'learn vue js in action', completed:true},
                {body:'go to the shop', completed:false}
            ]
        },
        methods: {
            toggleTasks: function (task) {
                task.completed = !task.completed;
            }
        }
    });
</script>
```
注：vue 1.0.14 这个版本v-class不能用，需要使用:class