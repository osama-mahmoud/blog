import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import post from '../components/posts.vue'
import PostDetails from '../components/PostDetails.vue';
// import CategoryPosts from '../components/CategoryPosts.vue';
// import AdminIndex from '../components/admin/AdminIndex.vue';

const routes = [
    { path: '/', component: post, name: 'post' },
    { path: '/post/:slug', component: PostDetails, name: 'PostDetails' },
  //  { path: '/category/:slug/posts', component: CategoryPosts, name: 'CategoryPosts' },
  //  { path: '/admin', component: AdminIndex, name: 'AdminIndex' },
];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
})

export default router;
