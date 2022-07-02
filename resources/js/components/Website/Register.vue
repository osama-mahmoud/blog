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
                                              <span class="text-danger" id="EmailErr" v-if="this.$store.state.emailerr">{{this.$store.state.emailerr.data.errors.email[0]}}</span>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1" style="color: black">Password</label>
                                              <input type="password" class="form-control Password" placeholder="Password" style="margin-top: 1px;" v-model="password" autocomplete="new-password">
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
            is_admin:0,
        }
       },
       computed:{
         NameError(){
             return this.name.length > 0 && this.name.length < 3
         },
         EmailError(){
           return !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) && this.email.length > 0
         },
         PasswordError(){
             return this.password.length > 1 && this.password.length < 6
         },
         isValidForm(){
             return  (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
         }
     },
     methods:{
       submitRegister(){
            let  {name,email,password,is_admin} = this;
            this.$store.dispatch('RegisterUser',{name,email,password,is_admin})
       },
       ClearInput(){
            this.name='',
            $(".Password").val(),
            this.password=''
       }
     }
}
</script>
