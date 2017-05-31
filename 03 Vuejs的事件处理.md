#Vuejs的事件处理

事件处理小实例  vue/04.v-on.submit.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
</style>

<div id="app">
    <form action="demo.html" v-on:submit="submitForm">
        <button type="submit">Submit</button>
    </form>
</div>

<script src="vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        methods: {
            submitForm: function(e){
                alert('app');
                e.preventDefault();
            }
        }
    });
</script>
```
或
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
</style>

<div id="app">
    <form action="demo.html" v-on:submit.prevent="submitForm">
        <button type="submit">Submit</button>
    </form>
</div>

<script src="vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        methods: {
            submitForm: function(){
                alert('app');
            }
        }
    });
</script>
```

事件处理小实例之点击累加  vue/05.v-on.click.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
</style>

<div id="app">
    <button type="button" v-on:click="updateCount">Submit {{ count }}</button>
</div>

<script src="vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
          count: 0
        },
        methods: {
            updateCount: function(){
                this.count++;
            }
        }
    });
</script>
```
或
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
</style>

<div id="app">
    <button type="button" v-on:click="count++">Submit {{ count }}</button>
</div>

<script src="vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
          count: 0
        }
    });
</script>
```