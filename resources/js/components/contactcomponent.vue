<template>
    <div>
<!--<div v-on:click="test(el)" id="test">КОНТАКТЫ<button>нажать</button></div>-->
<!--<div  id="test">КОНТАКТЫ<button>нажать</button></div>-->
<ul>
    <li id="test">КОНТАКТЫ</li>
</ul>

    </div>
</template>

<script>
export default {
    name: "contactcomponent",

    data() {
        return {

        }
    },
    mounted() {
        setTimeout(function () {
            document.getElementById('test').style.marginTop='15em';
            document.getElementById('test').style.marginLeft='15em';
        }, 1000)
    },
    methods:{
// test:function (el){
//     document.getElementById('test').style.marginTop='15em';
//     debugger;
//     alert("ok")
// }
    },
}
</script>

<style scoped>
#test{
    margin-top: 10em;
    transition: 3s;
    margin-left: 10em;
}
</style>
