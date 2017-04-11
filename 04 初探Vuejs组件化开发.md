#初探Vuejs组件化开发

组件开发小实例  06.counter.html
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

