
require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('pagination', require('laravel-vue-pagination'));

import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)

Vue.component('navcomponent', require('./components/navcomponent.vue').default);
Vue.component('maincomponent', require('./components/maincomponent.vue').default);
Vue.component('catalogcomponent', require('./components/catalogcomponent.vue').default);
Vue.component('contactcomponent', require('./components/contactcomponent.vue').default);
Vue.component('cartcomponent', require('./components/cartcomponent.vue').default);
Vue.component('ringcomponent', require('./components/ringcomponent.vue').default);
Vue.component('pendantcomponent', require('./components/pendantcomponent.vue').default);
Vue.component('braceletcomponent', require('./components/braceletcomponent.vue').default);
Vue.component('FormOrderComponent', require('./components/FormOrderComponent.vue').default);
Vue.component('splashscreen', require('./components/splashscreen.vue').default);
Vue.component('footercomponent', require('./components/footercomponent.vue').default);

import router from './router';
const app = new Vue({
    el: '#app',
    router,
    store, //vuex
});
