import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter)

import maincomponent from './components/maincomponent.vue';
import catalogcomponent from './components/catalogcomponent.vue';
import contactcomponent from './components/contactcomponent.vue';
import cartcomponent from './components/cartcomponent.vue';
import ringcomponent from './components/ringcomponent.vue';
import pendantcomponent from './components/pendantcomponent.vue';
import braceletcomponent from './components/braceletcomponent.vue';
import FormOrderComponent from './components/FormOrderComponent.vue';
import splashscreen from './components/splashscreen.vue';

const routes = [
    {
        path: '/splashscreen',
        component: splashscreen
    },
    {
        path: '/',
        name: 'main',
        component: maincomponent
    },
    {
        path: '/catalog',
        component: catalogcomponent
    },
    {
        path: '/contact',
        component: contactcomponent
    },
    {
        path: '/cart',
        component: cartcomponent
    },
    {
        path: '/ring',
        component: ringcomponent
    },
    {
        path: '/pendant',
        component: pendantcomponent
    },
    {
        path: '/bracelet',
        component: braceletcomponent
    },
    {
        path: '/formorder',
        component: FormOrderComponent
    },


]

export default new VueRouter({ mode: 'history', routes: routes })
