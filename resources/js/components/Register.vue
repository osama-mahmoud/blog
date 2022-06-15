<template>

                          <div class="modal fade Login" id="Register" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title" style="color: black">Registration form</h4>
                                </div>
                                <div class="modal-body">
                                        <form role="form" nonvalidate>
                                              <div class="form-group">
                                                <label for="exampleInputEmail1" style="color: black">Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Last Name" style="margin-top: 1px;" v-model="name">
                                                <span class="text-danger" v-show="NameError">to short</span>
                                              </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1" style="color: black">Email address</label>
                                              <input type="email" class="form-control" placeholder="Enter email" style="margin-top: 1px;" v-model="email">
                                              <span class="text-danger" v-show="EmailError">Email not valid</span>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1" style="color: black">Password</label>
                                              <input type="password" class="form-control" placeholder="Password" style="margin-top: 1px;" v-model="password">
                                              <span class="text-danger" v-show="PasswordError">Password to short</span>
                                            </div>
                                            <button @click.prevent="submitRegister" :disabled="!isValidForm" type="submit" class="btn btn-default">Submit</button>
                                          </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" id="CloseRegisterModal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
</template>
<script>
export default {
       data(){
        return{
            name:'',
            email:'',
            password:'',
        }
       },
       computed:{
         NameError(){
             return this.name.length > 0 && this.name.length < 4
         },
         EmailError(){
           return !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) && this.email.length > 0
         },
         PasswordError(){
             return this.password.length > 0 && this.password.length < 7
         },
         isValidForm(){
             return this.name.length > 4   &&
             this.password.length > 5 && (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
         }
     },
     methods:{
       submitRegister(){
           //console.log('submitted');
           //client sid  localstorage sessionstorage indexed db   state managment system
           //vue vuex
           //this.$store.state.userToken = "amine"
           //this.$store.commit('setUserToken',{userToken:'sdmfjsdkfjlsds'})
            //console.log(this.$store.getters.isLogged)
            let  {name,email,password} = this;
            this.$store.dispatch('RegisterUser',{name,email,password})
       }
     }
}
</script>
