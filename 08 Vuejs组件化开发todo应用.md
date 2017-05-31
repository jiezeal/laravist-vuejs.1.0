#Vuejs组件化开发todo应用

组件化开发todo应用  vue/12.component-todo.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
    ul{ list-style: none; margin-bottom: 20px; }
    button{ border: none; padding: 5px; color: #FFF; }
    .completed{ text-decoration: line-through; }
</style>

<div id="app">
    <task-app :list="tasks"></task-app>
    <task-app :list="[{body: 'learn oop', completed: false}, {body: 'learn English', completed: true}]"></task-app>
</div>

<template id="task-template">
    <ul>
        <li v-on:click="toggleTasks(task)" :class="{'completed':task.completed}" v-for="task in list">{{ task.body }}</li>
    </ul>
</template>
<script src="vue.js"></script>
<script>
    Vue.component('task-app', {
        template: '#task-template',
        props: ['list'],
        methods: {
            toggleTasks: function (task) {
                task.completed = !task.completed;
            }
        }
    });
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