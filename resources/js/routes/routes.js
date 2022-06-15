import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import post from '../components/posts.vue'
import PostDetails from '../components/PostDetails.vue';
import Categories from '../components/Categories.vue';
import CategoryPosts from '../components/CategoryPosts.vue';
import AllPosts from '../components/AllPosts.vue';
import SearchPosts from '../components/SearchPosts.vue';

const routes = [
    { path: '/', component: post, name: 'post' },
    { path: '/posts', component: AllPosts, name: 'AllPosts' },
    { path: '/post/:slug', component: PostDetails, name: 'PostDetails' },
    { path: '/categories', component: Categories, name: 'Categories' },
    { path: '/categories/:slug', component: CategoryPosts, name: 'CategoryPosts' },
    { path: '/SearchPosts/:query', component: SearchPosts, name: 'SearchPosts' },
];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
})

export default router;
