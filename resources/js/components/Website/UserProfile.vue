<template>
 <div id="product-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Profile</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div id="contact-us">
                        <div class="container">
                            <div class="row">
                                <div class="product-item col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="message-form">
                                         <span class="text-danger" id="EmailErrLogin" v-for="(value, name, index) in Errors">{{value[index]}}</span>
                                                 <form role="form" enctype="multipart/form-data">

                                                    <div class="name col-md-8">
                                                        <input required v-model="name" type="text" class="form-control" placeholder="Enter Name">
                                                    </div><div class="clearfix"></div><br>
                                                    <div class="email col-md-8">
                                                        <input v-model="email" type="email" class="form-control" placeholder="Enter Email">
                                                    </div><div class="clearfix"></div><br>
                                                    <div class="subject col-md-8">
                                                        <img :src="'/image/'+user_img" style="height:60px;width:60px;border:1px solid #999" alt="">
                                                        <input required @change="onImageChanged" type="file" class="form-control" placeholder="Image">
                                                    </div><div class="clearfix"></div><br>


                                                    <div class="name col-md-8">
                                                        <input v-model="password" type="password" id="myInput" class="form-control" placeholder="Password">
                                                    </div><div class="clearfix"></div><br>
                                                    <!-- <span toggle="#password-field" @click="showPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->

                                                    <div class="send col-md-8">
                                                        <button type="submit" @click.prevent="updateUser">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>
<script>
export default {
data(){
        return{
            id:[],
            name :'',
            email  :'',
			password  :'',
			user_img : '',
            Errors:[],
        }
       },
    mounted(){
     // this.isLogged();
      this.setUser();
    },
       methods:{
    //     showPassword(){
    //     var x = document.getElementById("myInput");
    //     if (x.type === "password") {
    //     x.type = "text";
    //     } else {
    //     x.type = "password";
    // }
    //     },
       onImageChanged(event){
			this.user_img  = event.target.files[0]
		},
        updateUser(){
			let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
			let formdata = new FormData();
            formdata.append('name',this.name)
            formdata.append('email',this.email)
            formdata.append('id',this.id)
            formdata.append('password',this.password)
            formdata.append('user_img',this.user_img)
			axios.post('/api/updateuserprofile',formdata,config)
			.then(res => {
                this.user_img = res.data.user_img
                this.name = res.data.name
                this.email = res.data.email
               // this.password = res.data.password
                this.$toaster.success('updated successfully.');
                this.Errors=[];
			}).catch(err => {
                  //  console.log(err.response.data.errors)
                    this.Errors = err.response.data.errors
                })
		},
     setUser(){
               if(this.isLogged){
                  axios.get('/api/user')
                        .then(res => { // console.log(res.data.user);
                            this.id = res.data.user.id;
                            this.name = res.data.user.name;
                            this.email = res.data.user.email;
                         //   this.password = res.data.user.password;
                            this.user_img = res.data.user.user_img;
                        })
               }
     }
       },
  computed:{
      isLogged(){
          return this.$store.getters.isLogged
      },
    //   isAdmin(){
    //       return this.$store.getters.isAdmin
    //   },
  },
}
</script>
