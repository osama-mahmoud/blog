<template>

  <div  class="modal fade" id="Login" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form">
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
                                        <button @click.prevent="submitLogin" :disabled="!isValidForm" type="submit" class="btn btn-default">Submit</button>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" id="CloseLoginModal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
</template>
<script>
export default {
       data(){
        return{
           // Modal:this.$store.state.showModal,
           name:'',
            email:'',
            password:'',
        }
       },
       computed:{
         EmailError(){
           return !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) && this.email.length > 0
         },
         PasswordError(){
             return this.password.length > 0 && this.password.length < 7
         },
         isValidForm(){
             return this.password.length > 5 && (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
         }
     },
     methods:{
       submitLogin(){
         let {email,password} = this;
           this.$store.dispatch('LoginUser',{email,password})
       }
     }
}
</script>
