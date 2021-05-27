<template>
    <div class="cart">
        <div v-if="$store.state.cart.length===0" class="text">
            <h3>Ваша корзина пуста,сделайте пожалуйста свой выбор)))</h3>
        </div>
        <h3 v-if="this.total2"></h3>
<!--        просто капец но без этого не работает-->
        <div  class="container" v-for="(el,index) in this.$store.state.cart" v-bind:key="el.name">
            <img class="imgcart" v-bind:src="'/storage/'+el.image">
            <div class="info">
                <div><h5> {{el.name}}</h5></div>
            </div>
            <div>
                <div class="but">
                </div>
                <div class="but">
                    <a href="#close" class="close-btn" title="добавить единицу данного товара в корзину" v-on:click="additem(el)">+</a>
                    <a href="#close" class="close-btn" title="удалить единицу данного товара из корзины" v-on:click="delitem(el,index)">-</a>
                    <a href="#close" class="close-btn" title="удалить товар из корзины" v-on:click="delcard(index)">&times;</a>
                    <div class="sum">
                        <div><h5>выбрано: {{el.defaultINcart}} шт.</h5></div>
                        <div><h5>на сумму: {{el.defaultINcart*el.price}} грн.</h5></div>
                    </div>
                    <div class="order"><router-link class="nav-link" to="/formorder">Оформить заказ</router-link></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    name: 'catrcomponent',
    data() {
        return {
            products: [],
            total: [],
        }
    },
    methods:{
        delcard: function (index) {
            this.$store.dispatch('ActionDeleteCard', index);
        },

        additem:function (el){
            el.defaultINcart = el.defaultINcart + 1;
            this.total.push(el);
            this.$store.dispatch('ActionAddItemsInfinalOrder', el);
            return  el.defaultINcart;
        },
        delitem: function (el, index) {
            if (el.defaultINcart <= 1) {
               this.$store.dispatch('ActionDeleteCard', index);
                this.$store.dispatch('ActionDeleteItemsFinalOrder', index);
            } else {
                el.defaultINcart = el.defaultINcart - 1;
                this.$store.dispatch('ActionDeleteItemsFinalOrder', index);
                return el.defaultINcart
            }
        },
    },
    mounted() {
    },
    computed: {
        total2() {
            let www = [];
            let sss = [];
            let yyy = [];
            let zzz = 0;
            let xxx = 0;
            for (let i = 0; i < this.$store.state.cart.length; i++) {
                sss.push(this.$store.state.cart[i]);
                this.total = sss;
            }
            for (let i = 0; i < this.total.length; i++) {
                zzz = this.total[i].defaultINcart + zzz;
                xxx = xxx + this.total[i].defaultINcart * this.total[i].price;
                yyy.push(zzz, xxx);
                www = yyy.slice(yyy.length - 2, yyy.length)
            }
            if (this.$store.state.cart.length === 0) {
                www = [];
                this.$store.dispatch('TOTAL', www);
                return www
            }
            // return this.total под заказ товара с первым FOR
            this.$store.dispatch('TOTAL', www);
            return www
        },
    },
};
</script>

<style scoped>

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    top: 0;
    left: 0;
    width: 80%;
    height: auto;
    margin-top: 2em;
    border: white 1px solid;
    box-shadow: 0em 0em 2em white;
}

.imgcart {
    width: 200px;
    height: 250px;
    border: 3px solid white;
}

.but {
    position: relative;
    top: -150px;
    display: flex;
    margin-top: 80px;
    margin-left: 50px;
}
.close-btn {
    position: relative;
    top: 10px;
    left: 330px;
    color: dodgerblue;
    font-size: 30px;
    text-decoration: none;
    margin-left: 30px;
}
.order {
    width: 250px;
    height: 50px;
    position: relative;
    display: flex;
    justify-content: center;
    top: 180px;
    left: -3em;
}
.sum {
    position: relative;
    width: 200px;
    height: 90px;
    top: 80px;
    left: 100px;
}
.info {
    position: absolute;
    width: 200px;
    height: 50px;
    left: 550px;
}
.text {
    display: flex;
    justify-content: center;
    align-items: center;
}
.cart{
    background-image: url("/storage/newimage/fon2.jpg");
    background-size: 100%;
    margin-top: 5em;
}
h5{
    color: white;
}
</style>
