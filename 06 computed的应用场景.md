#computed的应用场景

computed小实例  08.computed.html
```
<style>
    *{ margin: 0; padding: 0; }
    body{ margin: 50px; }
    button{ border: none; padding: 5px; color: #FFF; }
</style>

<div id="app">
    Laravel {{ username }} {{ level }}
    <br />
    <input type="text" v-model="first">
    <input type="text" v-model="last">
</div>

<script src="vue.js"></script>
<script>
    new Vue({
        el: "#app",
        data: {
            points: 200,
            first: 'zhu',
            last: 'linjie'
        },
        computed: {
            username: function(){
              return this.first + '' + this.last;
            },
            level: function(){
                if(this.points <= 100){
                    return '普通会员';
                }
                return 'VIP会员';
            }
        }
    });
</script>
```