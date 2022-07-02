/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('global-home', require('./components/Website/GlobalHome.vue').default);
Vue.component('Register', require('./components/Website/Register.vue').default);
Vue.component('Login', require('./components/Website/Login.vue').default);
Vue.component('global-admin', require('./components/Dashboard/GlobalAdmin.vue').default);

import router from './routes/routes'

import Vuex from 'vuex';
import Axios from 'axios';
Vue.use(Vuex)
import store from './store.js'
    // state action mutation getter
    import Toaster from 'v-toaster'

// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css'

// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, {timeout: 5000})

// const store = new Vuex.Store({
//     state: {
//         userToken: null,
//         user: null,
//        // showModal: false,
//         EditedPost: {},
//         emailerr:'',
//         emailerrLog:''
//     },
//     getters: { //center
//         isLogged(state) {
//             return !!state.userToken;
//         }, checkAdmin(state) {
//             return state.user;
//         },
//         isAdmin(state) {
//             if (state.user) {
//                 return state.user.is_admin
//             }
//             return null

//         },
//         PostToEdit(state) {
//             return state.EditedPost
//         }
//     },
//     mutations: {
//         emailError(state,Error){
//             state.emailerr = Error;
//         },
//         emailErrorLogin(state,Error){
//             state.emailerrLog = Error;
//         },
//         setUserToken(state, userToken) {
//             state.userToken = userToken;
//             localStorage.setItem('userToken', JSON.stringify(userToken));
//             axios.defaults.headers.common.Authorization = `Bearer ${userToken}`
//         },
//         removeUserToken(state) {

//             state.userToken = null;
//             localStorage.removeItem('userToken')
//         },
//         setUser(state, user) {
//             state.user = user
//         },
//         logout(state) {
//             state.userToken = null;
//             localStorage.removeItem('userToken');
//             $('.Logout').hide();
//           //  $('.addNew').hide();
//             // window.location.href = '/';Login
//         },
//         EditPost(state, post) {
//             state.EditedPost = post;
//         }
//     },
//     actions: {
//         RegisterUser({ commit }, payload) {
//             axios.post('/api/register', payload)
//                 .then(res => {
//                   //  console.log(res)
//                     commit('setUserToken', res.data.token)
//                   //  $('.addNew').text("welcome " + res.data.user.name);
//                   axios.get('/api/user')
//                   .then(res => {
//                      // console.log(res.data)
//                       commit('setUser', res.data.user)
//                    //   $('.addNew').text("welcome " + res.data.user.name);
//                   })
//                     document.getElementById('CloseRegisterModal').click();
//                     $('#EmailErr').hide();
//                 })
//                 .catch(err => {
//                     console.log(err)
//                     commit('emailError', err.response)
//                 })
//         },
//         LoginUser({ commit }, payload) {
//             axios.post('/api/login', payload)
//                 .then(res => {
//                   //  console.log(res)
//                     commit('setUserToken', res.data.token)
//                     axios.get('/api/user')
//                         .then(res => {
//                             $('#EmailErrLogin').hide();
//                             commit('setUser', res.data.user)
//                          //   $('.addNew').text("welcome " + res.data.user.name);
//                             document.getElementById('CloseLoginModal').click();
//                         })
//                 })
//                 .catch(err => {
//                     console.log(err)
//                     commit('emailErrorLogin', err.response)
//                 })

//         }

//     }

// })

const app = new Vue({
    el: '#app',
    store,
    router,
});
