/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('PostDetails', require('./components/PostDetails.vue').default);
Vue.component('posts', require('./components/posts.vue').default);
Vue.component('global-home', require('./components/GlobalHome.vue').default);

import router from './routes/routes'

const app = new Vue({
    el: '#app',
    router,
});
