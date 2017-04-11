#Vuejs的数据双向绑定

https://cdn.bootcss.com/vue/1.0.14/vue.min.js

入门小例子
```
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue js</title>
</head>
<body>
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
</body>
</html>
```

数据双向绑定小例子
```
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue js</title>
</head>
<body>
    <div id="app">
        <h1>{{ message }}</h1>
        <input type="text" v-model="message">
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
</body>
</html>
```

