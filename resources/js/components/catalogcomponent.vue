<template>
    <div class="fon">

    <div style="margin-top: 4rem">
        <ol class="breadcrumb">
            <router-link style="text-decoration: white;color: greenyellow" class="breadcrumb-item" to="/">Главная</router-link>-->
            <li style="color: gainsboro" class="breadcrumb-item active" aria-current="page">Каталог</li>-->
            <router-link style="text-decoration: white;color: greenyellow" class="breadcrumb-item" to="/ring">Кольца</router-link>-->
            <router-link style="text-decoration: white;color: greenyellow" class="breadcrumb-item" to="/bracelet">Браслеты</router-link>-->
            <router-link style="text-decoration: white;color: greenyellow" class="breadcrumb-item" to="/pendant">Кулоны</router-link>-->
        </ol>
    </div>


    <div  class="productsINcatalog">
        <div class="products" v-for="product in products.data" :key="products.id">
            <div class="card-header">
                <div class="card-text" style="color: white">{{ product.category }}</div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <img v-bind:src="'/storage/'+product.image">
                <div class="card-body ">
                    <h5 class="card-text">{{ product.name }}</h5>
                    <div class="card-text">{{ product.price }}</div>
                    <button v-on:click="addTOcart(product)" class="btn btn-outline-secondary">в корзину</button>
                </div>
            </div>
        </div>
<!--    </div>-->
        <!--             paginate-->
        </div>
        <div class="pagin">
            <pagination  :data="products" @pagination-change-page="getproduct"></pagination>
        </div>
        <div class="add"></div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "catalogcomponent",

    data() {
        return {
            //products: [],
            products: {},

        }
    },
    mounted() {
        this.getproduct();
    },
    methods: {
        // getproduct: function () {
        //     axios.get('/api/product').then((resp) => {
        //         this.products = resp.data;
        //         // console.log(this.products)
        //     })
        // },
        //------------------------
        getproduct (page = 1) {
            axios.get('/api/product?page=' + page)
                .then(response => {
                    this.products = response.data;

                })
        },
        //-----------------------
        addTOcart: function (product) {
            this.$store.dispatch('TOCART', product);
        },
    }
}
</script>

<style scoped>
.fon{
    background-image: url("/storage/newimage/fon2.jpg");
    background-size: 100%;
    margin-top: 3em;
}
.productsINcatalog {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-left: -3em;
    margin-top: -3rem;
}
.products {
    width: 12.4em;
    height: 23em;
    margin-top: 3em;
    margin-left: 3em;
    box-shadow: 1em 1em 2em grey;
    border: 3px solid white;
    border-radius: 0.5em;
    overflow: hidden;
}

img {
    width: 13em;
    height: 13em;
}
img:hover{
    width: 23em;
    height: 23em;
    margin-left: -5rem;
}
h5 {
    color: fuchsia;
    text-align: center;
    font-family: "Noto Sans";
}
.card-text{
    font-family: "Noto Sans";
}
.card-body{
    margin-top: -1em;
    margin-left: -5.5rem;
}
.breadcrumb{
    background-color: transparent;
margin-top: 0.5rem;
}
.pagin{
    position: relative;
    display: flex;
    justify-content: center;
    top: 2em;
}
.add{
    width: 100%;
    height: 80px;
}

</style>
