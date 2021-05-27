
<template>
    <div class="fon">
        <div style="margin-top: 4rem">
            <ol class="breadcrumb">
                <router-link style="text-decoration: white;color: greenyellow" class="breadcrumb-item" to="/">Главная</router-link>-->
                <router-link style="text-decoration: white;color: greenyellow" class="breadcrumb-item" to="/catalog">Каталог</router-link>-->
                <router-link style="text-decoration: white;color: greenyellow" class="breadcrumb-item" to="/ring">Кольца</router-link>-->
                <router-link style="text-decoration: white;color: greenyellow" class="breadcrumb-item" to="/bracelet">Браслеты</router-link>-->
                <li style="color: gainsboro" class="breadcrumb-item active" aria-current="page">Кулоны</li>
            </ol>
        </div>
        <div id="qq" class="productsINcatalog">
            <div class="products" v-for="product in products.data">
                <div class="card-header">
                    <div class="card-text" style="color: white">{{ product.category }}</div>
                </div>
                <div class="card text-center" style="width: 18rem">
                    <img v-bind:src="'/storage/'+product.image">
                    <div class="card-body ">
                        <h4 class="card-text">{{ product.name }}</h4>
                        <div class="card-text">{{ product.price }}</div>
                        <button v-on:click="addTOcart(product)" class="btn btn-outline-secondary">в корзину</button>
                    </div>
                </div>
            </div>
            <div class="pagin">
                <pagination  :data="products" @pagination-change-page="getpendant"></pagination>
            </div>
        </div>
        <div class="add"></div>
    </div>
</template>

<script>

import axios from "axios";
import Vuex from 'vuex';
export default {
    name: "pendantcomponent",
    data() {
        return {
            products: {},
            category:"pendant",
        }
    },
    beforeMount() {
        this.getpendant();
    },
    methods: {
        getpendant (page = 1) {
            axios.get('/api/pendant?page=' + page)
                .then(response => {
                    this.products = response.data;
                })
        },
        addTOcart: function (product) {
            this.$store.dispatch('TOCART', product);
        },
    }
}
</script>

<style scoped>
.fon{
    background-image: url("/storage/newimage/fon2.jpg");
    background-size:100%,50%;
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
    position: absolute;
    top: 32rem;
    display: flex;
    justify-content: left;
}
.add{
    width: 100%;
    height: 80px;
}
</style>
