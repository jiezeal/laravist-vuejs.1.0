#Vuejs处理列表数据

v-for小实例
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