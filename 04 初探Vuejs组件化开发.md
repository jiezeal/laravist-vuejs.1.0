#初探Vuejs组件化开发

组件开发小实例  vue/06.counter.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
</style>

<div id="app">
    <counter></counter>
</div>

<script src="vue.min.js"></script>
<script>
    Vue.component('counter', {
        template: '<h1>Hello World</h1>'
    });

    new Vue({
        el: '#app'
    });
</script>
```
或者
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
</style>

<div id="app">
    <counter></counter>
</div>

<template id="counter-template">
    <h1>Hello World</h1>
</template>

<script src="vue.min.js"></script>
<script>
    Vue.component('counter', {
        template: '#counter-template'
    });

    new Vue({
        el: '#app'
    });
</script>
```

组件化小实例 Likes与Dislikes  vue/07.likes.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
    button{ border: none; padding: 5px; color: #FFF; }
</style>

<div id="app">
    <counter heading="Likes" color="green"></counter>
    <counter heading="Dislikes" color="#c40000"></counter>
</div>

<template id="counter-template">
    <h1>{{ heading }}</h1>
    <button v-on:click="count++" style="background: {{ color }}">Submit {{ count }}</button>
</template>

<script src="vue.min.js"></script>
<script>
    Vue.component('counter', {
        template: '#counter-template',
        props: ['heading', 'color'],
        data: function(){
            return { count: 0 };
        }
    });

    new Vue({
        el: '#app'
    });
</script>
```