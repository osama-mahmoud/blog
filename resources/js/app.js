/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('Categories', require('./components/Categories.vue').default);
Vue.component('PostDetails', require('./components/PostDetails.vue').default);
Vue.component('CategoryPosts', require('./components/CategoryPosts.vue').default);
Vue.component('posts', require('./components/posts.vue').default);
Vue.component('global-home', require('./components/GlobalHome.vue').default);
Vue.component('SearchPosts', require('./components/SearchPosts.vue').default);
Vue.component('AllPosts', require('./components/AllPosts.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('Register', require('./components/Register.vue').default);
Vue.component('Login', require('./components/Login.vue').default);

import router from './routes/routes'

import Vuex from 'vuex';
import Axios from 'axios';

Vue.use(Vuex)
    // state action mutation getter
const store = new Vuex.Store({
    state: {
        userToken: null,
        user: null,
       // showModal: false,
        EditedPost: {}
    },
    getters: { //center
        isLogged(state) {
            return !!state.userToken;
        },
        isAdmin(state) {
            if (state.user) {
                return state.user.is_admin
            }
            return null

        },
        PostToEdit(state) {
            return state.EditedPost
        }
    },
    mutations: {
        // changeName (state, payload) {
        //     state.showModal = payload
        //   },
        setUserToken(state, userToken) {
            state.userToken = userToken;
            localStorage.setItem('userToken', JSON.stringify(userToken));
            axios.defaults.headers.common.Authorization = `Bearer ${userToken}`
        },
        removeUserToken(state) {

            state.userToken = null;
            localStorage.removeItem('userToken')
        },
        setUser(state, user) {
            state.user = user
        },
        logout(state) {
            state.userToken = null;
            localStorage.removeItem('userToken');$('.Logout').hide();
            // window.location.href = '/';
        },
        EditPost(state, post) {
            state.EditedPost = post;
        }
    },
    actions: {
        RegisterUser({ commit }, payload) {
            axios.post('/api/register', payload)
                .then(res => {
                    console.log(res)
                    commit('setUserToken', res.data.token)
                    document.getElementById('CloseRegisterModal').click();
                })
                .catch(err => {
                    console.log(err)
                })
        },
        LoginUser({ commit }, payload) {
            axios.post('/api/login', payload)
                .then(res => {
                    console.log(res)
                    commit('setUserToken', res.data.token)
                    axios.get('/api/user')
                        .then(res => {
                            //console.log(res.data)
                            commit('setUser', res.data.user)
                            document.getElementById('CloseLoginModal').click();
                        })
                })
                .catch(err => {
                    console.log(err)
                })

        }

    }

})

const app = new Vue({
    el: '#app',
    router,
    store: store
});
