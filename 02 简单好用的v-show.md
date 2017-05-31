#简单好用的v-show

v-show小实例  vue/03.v-show.html
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
注： v-show与v-if的区别是，在隐藏的时候v-show只会将元素的显示模式设置为none，而v-if会将元素删除掉