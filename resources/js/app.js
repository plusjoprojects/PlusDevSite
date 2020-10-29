/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from "vue";
import vuetify from "./plugins/vuetify";
import routes from "./routes/routes";
import VueRouter from "vue-router";
import App from './App.vue'

Vue.use(VueRouter);

const router = new VueRouter({
    routes, // short for routes: routes
    
});
const app = new Vue({
    el: "#app",
    render: h => h(App),
    vuetify,
    router
});
