import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store.js'
Vue.use(VueRouter);

import GlobalHome from '../components/Website/GlobalHome.vue'
                // Website //
import Home from '../components/Website/Home.vue'
import PostDetails from '../components/Website/PostDetails.vue';
import Categories from '../components/Website/Categories.vue';
import CategoryPosts from '../components/Website/CategoryPosts.vue';
import AllPosts from '../components/Website/AllPosts.vue';
import SearchResult from '../components/Website/SearchResult.vue';
import UserProfile from '../components/Website/UserProfile.vue';
               // Admin //
import AdminUsers from '../components/Dashboard/AdminUsers.vue';
import AdminHome from '../components/Dashboard/AdminHome.vue';
import AdminPosts from '../components/Dashboard/AdminPosts.vue';
import AdminCategories from '../components/Dashboard/AdminCategories.vue';
import AdminSettings from '../components/Dashboard/AdminSettings.vue';
import AdminComments from '../components/Dashboard/AdminComments.vue';



const routes = [
                        // Website Routes  //
    { path: '/', component: Home, name: 'Home' , meta: { allUsers: true }},


    // {
    //     path: '/',
    //     name: 'Home',
    //     components: {
    //       default: GlobalHome,
    //       father: Home,
    //      // b: Baz
    //     }
    //   },



    { path: '/Profile', component: UserProfile, name: 'UserProfile' , meta: { allUsers: true }},
    { path: '/posts', component: AllPosts, name: 'AllPosts' , meta: { allUsers: true }},
    { path: '/SearchResult', component: SearchResult , props: true , name: 'SearchResult' , meta: { allUsers: true }},
    { path: '/post/:slug', component: PostDetails, name: 'PostDetails' , meta: { allUsers: true }},
    { path: '/categories', component: Categories, name: 'Categories' , meta: { allUsers: true }},
    { path: '/categories/:slug', component: CategoryPosts, name: 'CategoryPosts' , meta: { allUsers: true }},
                         // Admin Panel Routes //
    { path: '/adminpanel', component: AdminHome, name: 'AdminHome', meta: { adminOnly: true }},
    { path: '/adminpanel/posts', component: AdminPosts, name: 'AdminPosts' , meta: { adminOnly: true }},
    { path: '/adminpanel/categories', component: AdminCategories, name: 'AdminCategories' , meta: { adminOnly: true }},
    { path: '/adminpanel/users', component: AdminUsers, name: 'AdminUsers' , meta: { adminOnly: true }},
    { path: '/adminpanel/settings', component: AdminSettings, name: 'AdminSettings' , meta: { adminOnly: true }},
    { path: '/adminpanel/comments', component: AdminComments, name: 'AdminComments' , meta: { allUsers: true }},
];


const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history',
    linkActiveClass: "active",
})

// Validation for route
router.beforeEach((to, from, next) => {
       let token =JSON.parse(localStorage.getItem('userToken'));
       store.commit('setUserToken',token)
       if(store.getters.isLogged){
       axios.get('/api/user')
       .then(res => {
           store.commit('setUser', res.data.user)
            const adminStatus = store.getters.isAdmin;
            if (to.matched.some(record => record.meta.adminOnly && !adminStatus)) {
              router.go(-1)
            } else next()
        })
       }
     if (to.matched.some(record => record.meta.allUsers)) {
        next()
     }
      let web = ["AdminHome", "AdminPosts", "AdminCategories", "AdminUsers","AdminSettings","AdminComments"];
    if(web.includes(to.name) && !store.getters.isLogged){
        router.go(-1)
    }
 })



export default router;
