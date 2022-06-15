<template><div>
<header>
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="home-account">
                        <a v-if="!isLogged" href="#" data-toggle="modal" data-target="#Register">Register</a>
                        <a v-if="!isLogged" @click="mod" href="#" data-toggle="modal" data-target="#Login">Login</a>
                        <a v-if="isLogged" @click.stop="logout" href="#">Logout</a>
                        <login></login>
                        <register></register>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cart-info">
                        <i class="fa fa-phone" style="padding-right: 7px;"></i>010-020-0340
                        <i class="fa fa-envelope" style="margin-left: 12px;padding-right: 7px;"></i>info@company.com
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
                        <a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template" ></a>
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
                   <search-posts></search-posts>
                </div>
            </div>
        </div>
    </div>
</header>
<router-view></router-view></div>
</template>
<script>
export default {
    data(){
        return{
           // Modal:this.$store.state.showModal,

        }
       },
  created(){
      this.updateToken()

      this.setUser();
  },methods:{
     updateToken(){
       let token =JSON.parse(localStorage.getItem('userToken'));
       this.$store.commit('setUserToken',token)
     },
     setUser(){
               if(this.isLogged){
                  axios.get('/api/user')
                        .then(res => {
                            //console.log(res.data)
                            this.$store.commit('setUser', res.data.user)
                        })
               }
     },
     logout(){

         this.$store.commit('logout')

     },
     mod(){
    // this.$store.commit("changeName", true);
 // this.Modal = true
   console.log(this.$store.state.showModal)
     }
  },
  computed:{
      isLogged(){
          return this.$store.getters.isLogged
      },
      isAdmin(){
          return this.$store.getters.isAdmin
      }
  }
}
</script>
