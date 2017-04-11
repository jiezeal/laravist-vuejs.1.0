#简单好用的v-show

v-show小实例
```
<style>
    *{
        margin: 0;
        padding: 0;
    }
    body{
        margin: 50px;
    }
    ul{
        list-style: none;
    }
    textarea{
        width: 350px;
        height:120px;
    }
</style>

<div id="app">
    <div class="error" v-show="!message">You must enter a message to submit</div>
    <form>
        <ul>
            <li>
                <textarea v-model="message"></textarea>
            </li>
            <li>
                <button v-if="message">Send Message</button>
            </li>
        </ul>
    </form>

    <pre>{{ $data | json }}</pre>
</div>

<script src="vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            message: ""
        }
    });
</script>
```