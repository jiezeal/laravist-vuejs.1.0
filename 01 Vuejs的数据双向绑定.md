#Vuejs的数据双向绑定

https://cdn.bootcss.com/vue/1.0.14/vue.min.js

入门小例子  01.hello-vue.html
```
<div id="app">
    <h1>{{ message }}</h1>
</div>

<script src="vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            message: "Hello Vue!"
        }
    });
</script>
```

数据双向绑定小例子  02.v-model.html
```
<div id="app">
    <h1>{{ message }}</h1>
    <input type="text" v-model="message">
    <pre>
        {{ $data | json }}
    </pre>
</div>

<script src="vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            message: "Hello Vue!"
        }
    });
</script>
```

