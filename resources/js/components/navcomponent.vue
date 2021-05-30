<!--<template xmlns="http://www.w3.org/1999/html">-->
<template>
    <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top" >
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <router-link class="nav-link" to="/">Главная <span class="sr-only">(current)</span></router-link>
                </li>
<!--                <li class="nav-item active">-->
<!--                    <router-link class="nav-link" to="/splashscreen">Заставка <span class="sr-only">(current)</span></router-link>-->
<!--                </li>-->
                <li class="nav-item">
                    <router-link class="nav-link" to="/catalog">Каталог</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/contact">Контакты</router-link>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Все украшения
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <router-link  class="dropdown-item" to="/ring">кольца</router-link>
                        <router-link class="dropdown-item" to="/bracelet">браслеты</router-link>
                        <router-link class="dropdown-item" to="/pendant">кулоны</router-link>
                    </div>
                </li>


<!--                <li v-if="this.$store.state.cart.length" class="nav-item">-->
<!--                    <router-link style="color: red" class="nav-link" to="/cart">В корзине есть товар</router-link>-->
<!--                </li>-->
<!--                <li v-if="!this.$store.state.cart.length" class="nav-item">-->
<!--                    <router-link class="nav-link" to="/cart">Корзина</router-link>-->
<!--                </li>-->
<!--                ===============================================-->
<!--                cart in SVG-->
                <li v-if="!this.$store.state.cart.length" class="nav-item" style="margin-top: -0.3em;margin-left: 42em">
                    <router-link class="nav-link" to="/cart"><svg  width="30" height="40" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
                    </svg></router-link>
                </li>
                <li   v-if="this.$store.state.cart.length" class="nav-item" style="margin-top: -0.3em;margin-left: 42em">
                    <router-link style="color: deeppink" class="nav-link" to="/cart"><svg  width="30" height="40" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
                    </svg></router-link>
                </li>
                <!--                ===============================================-->



<!--                <div id="movecart">-->
<!--                    <li   v-if="this.$store.state.cart.length" class="nav-item">-->
<!--                        <router-link style="color: deeppink" class="nav-link" to="/cart"><svg  width="30" height="40" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">-->
<!--                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>-->
<!--                        </svg></router-link>-->
<!--                    </li>-->
<!--                </div>-->



                <div v-if="this.$store.state.total.length>0" class="info">{{this.$store.state.total[0]}} </div>
                <div v-if="this.$store.state.total.length>0" class="info2">{{this.$store.state.total[1]}}.грн</div>

<!--                <li class="nav-item">-->
<!--                    <router-link class="nav-link" to="/auth">Авторизация</router-link>-->
<!--                </li>-->
<!--                <li  class="nav-item">-->
<!--                    <router-link class="nav-link" to="/register">Регистрация</router-link>-->
<!--                </li>-->
            </ul>
        </div>
        </div>
    </nav>

<!--        <div class="bread ">-->
<!--            <div style="margin-left: 1.5em ;display: flex">-->
<!--                <div  ><router-link style="color: gray" class=" nav-link navbar-light bg-light navbar" to="/ring" >Кольца ><span class="sr-only">(current)</span></router-link></div>-->
<!--                <div  ><router-link style="color: gray" class="nav-link navbar-light bg-light navbar " to="/bracelet" >Браслеты ></router-link></div>-->
<!--                <div  > <router-link style="color: gray" class="nav-link navbar-light bg-light navbar " to="/pendant" >Кулоны></router-link></div>-->
<!--            </div>-->
<!--        </div>-->

    </div>
</template>

<script>

export default {
    name: "navcomponent",
    data() {
        return {

        }
    },
    methods:{
// testfun:function (){
//     setTimeout(function () {
//         document.getElementById('movecart').style.marginLeft='42em';
//
//     }, 1000)
// }
    },
    mounted() {
        // setTimeout(this.testfun, 5000);

    },
    created() {

    },
    computed:{

    }
}
</script>

<style scoped>
.info{
    width: 2em;
    left: -11em;
    top: 5px;
}
.info2{
    width: 5em;
    left: -10.5em;
    top: 5px;
}
.info,.info2{
    position: relative;
    height: 2em;
    background-color: deeppink;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;

}
.bread{
    position: fixed;
    margin-top: 1rem;
    width: 100%;
background-color: ghostwhite;
   z-index: 3;
    display: flex;
    justify-content: left;
    justify-items: center;

}

/*#movecart{*/
/*    margin-top: -0.3em;*/
/*    margin-left: 50em;*/
/*    transition: 2s;*/
/*}*/
</style>
