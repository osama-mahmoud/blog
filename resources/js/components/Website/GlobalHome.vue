<template>
<div>
<header>
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="home-account">
                        <a v-if="!isLogged" href="#" data-toggle="modal" data-target="#Register">Register</a>
                        <a v-if="!isLogged" href="#" data-toggle="modal" data-target="#Login">Login</a>
                        <a v-if="isLogged" @click.stop="logout" href="#">Logout</a>
                        <span v-if="isLogged && this.$store.state.user" class="addNew">Welcome {{this.$store.state.user.name}}</span>
                        <login></login>
                        <register></register>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-info">
                        <i class="fa fa-phone" style="padding-right: 7px;"></i>{{getSettings.phone_number}}
                        <i class="fa fa-envelope" style="margin-left: 12px;padding-right: 7px;"></i>{{getSettings.contact_email}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="#"><img :src="'/image/'+getSettings.image" style="height:80px;width:80px;border:2px solid #999" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-menu">
                        <ul>
                            <li><router-link :to="'/'">Home</router-link></li>
                            <li><router-link :to="'/posts'">Posts</router-link></li>
                            <li><router-link :to="'/categories'">Categories</router-link></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                   <div class="search-box">
                        <form name="search_form" method="get" class="search_form">
                            <input id="search" type="text" v-model="page" />
                            <input type="submit" id="search-button" @click.prevent="searchForm"/>
                            <!-- <router-link :to="'/SearchResult/'+results">search</router-link> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<router-view :key="$route.fullPath"></router-view>
<footer>
    <div class="container">
        <div class="top-footer">
        </div>
        <div class="main-footer">
            <div class="row">
                <div class="col-md-3">
                    <div class="about">
                        <h4 class="footer-title">About Grill</h4>
                        <p>Grill is free HTML5 template by <span class="blue">template</span><span class="green">mo</span> and it is a free responsive bootstrap layout that can be applied for any purpose.
                        <br><br>Credit goes to <a rel="nofollow" href="http://unsplash.com">Unsplash</a> for photos used in this template. Nam commodo erat quis ligula placerat viverra.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shop-list">
                        <h4 class="footer-title">Shop Categories</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i>New Grill Menu</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Healthy Fresh Juices</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Spicy Delicious Meals</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Simple Italian Pizzas</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Pure Good Yogurts</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Ice-cream for kids</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="recent-posts">
                        <h4 class="footer-title">Recent posts</h4>
                        <div class="recent-post">
                            <div class="recent-post-thumb">
                                <img src="images/recent-post1.jpg" alt="">
                            </div>
                            <div class="recent-post-info">
                                <h6><a href="#">Delicious and Healthy Menus</a></h6>
                                <span>24/12/2084</span>
                            </div>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post-thumb">
                                <img src="images/recent-post2.jpg" alt="">
                            </div>
                            <div class="recent-post-info">
                                <h6><a href="#">Simple and effective meals</a></h6>
                                <span>18/12/2084</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="more-info">
                        <h4 class="footer-title">More info</h4>
                        <p>Sed dignissim, diam id molestie faucibus, purus nisl pretium quam, in pulvinar velit massa id elit.</p>
                        <ul>
                            <li><i class="fa fa-phone"></i>{{getSettings.phone_number}}</li>
                            <li><i class="fa fa-globe"></i>{{getSettings.address}}</li>
                            <li><i class="fa fa-envelope"></i><a href="#">{{getSettings.contact_email}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <p>
                <span>Copyright © 2084 <a href="#">{{getSettings.site_name}}</a>
                | Design: <a rel="nofollow" href="" target="_parent"><span class="blue">Osama</span></a></span>
            </p>
        </div>

    </div>
</footer>
</div>
</template>
<script>
export default {
    data(){
        return{
            username:'',
            page:'',
            getSettings: [],
        }
       },
    created(){
      this.updateToken()
      $(".Password").val(),
      this.getAllSettings();
      this.setUser();
    },  methods:{
        getAllSettings(){
            axios.get('/api/allSettings')
            .then(res => {
             this.getSettings = res.data[0];
            })
            .then(err => console.log(err))
        },
        searchForm(){
            this.$router.push({
            path: '/SearchResult',
            query: {
            arrgu:this.page,
          }
        })
        },
     updateToken(){
       let token =JSON.parse(localStorage.getItem('userToken'));
       this.$store.commit('setUserToken',token)
     },
     setUser(){
               if(this.isLogged){
                  axios.get('/api/user')
                        .then(res => {
                            this.username = res.data.user.name;
                            this.$store.commit('setUser', res.data.user);
                        })
               }
     },
     logout(){
         this.$store.commit('logout')
         this.username = ''
     },
  },
  computed:{
      isLogged(){
          return this.$store.getters.isLogged
      },
      isAdmin(){
          return this.$store.getters.isAdmin
      },
  },
}
</script>
