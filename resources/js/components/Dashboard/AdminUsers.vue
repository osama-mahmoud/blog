<template>
  <div class="container-fluid">
    <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-success btn-lg text-white" data-toggle="modal" data-target="#AddModal" @click="ClearErrors()">Add</button>
                <br><br>
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <div class="table-responsive">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
    <table class="table table-bordered" id="datatable">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Image</th>
          <th>Created On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(user,i) in users" :key="user.id">
          <td>{{ i+1  }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
            <td><img :src="'/image/'+user.user_img" style="width:100px;height:60px;border:1px solid #e7e7e7" alt=""></td>
          <td>{{ user.created_at }}</td>
          <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditModal" @click="editClick(user)"><i class="mdi mdi-pencil"></i></button>
            <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#DeleteModal" @click="deleteUser(user.id)"><i class="me-2 mdi mdi-delete"></i></button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ViewModal" @click="editClick(user)"><i class="me-2 mdi mdi-eye"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>






<div  class="modal fade" id="AddModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Add User</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Name</label>
                                          <input required v-model="name" type="text" class="form-control" placeholder="Enter Name" style="margin-top: 1px;">
                                          <!-- <span class="text-danger" v-if="Errors.title">{{ Errors.name[0] }}</span> -->
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Email</label>
                                          <input v-model="email" type="email" class="form-control" placeholder="Enter Email" style="margin-top: 1px;">
                                          <span class="text-danger" v-if="Errors.email">{{ Errors.email[0] }}</span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Password</label>
                                          <input v-model="password" type="password" class="form-control" placeholder="Enter Password" style="margin-top: 1px;">
                                          <!-- <span class="text-danger" v-if="Errors.body">{{ Errors.body[0] }}</span> -->
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Role</label>
                                          <select class="form-control" aria-label="Default select example" v-model="is_admin" required>
                                           <option value="" disabled selected>choose role</option>
                                           <option value="0">User</option>
                                           <option value="1">Admin</option>
                                          </select>
                                          <!-- <span class="text-danger" v-if="Errors.category_id">{{ Errors.category_id[0] }}</span> -->
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1" style="color: black">Image</label>
                                          <input required @change="onImageChanged" type="file" class="form-control" placeholder="Image" style="margin-top: 1px;">
                                          <!-- <span class="text-danger" v-if="Errors.image">{{ Errors.image[0] }}</span> -->
                                        </div>
                                        <button type="submit" class="btn btn-default" @click.prevent="addUser">Submit</button>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" id="CloseLoginModal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>




                          <div  class="modal fade" id="EditModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit User</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <!-- <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Name</label>
                                          <input required v-model="editUser.name" type="text" class="form-control" placeholder="Enter Title" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Email</label>
                                          <input v-model="editUser.email" type="email" class="form-control" placeholder="Enter Slug" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div> -->
                                        <!-- <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Password</label>
                                          <input v-model="editUser.password" type="password" class="form-control" placeholder="Enter Description" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div> -->
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Role</label>
                                          <select class="form-control" aria-label="Default select example" v-model="editUser.is_admin" required @change="change($event)">
                                           <option value="0">User</option>
                                           <option value="1">Admin</option>
                                          </select>
                                          <span class="text-danger"></span>
                                        </div>
                                        <!-- <div class="form-group">
                                          <label for="exampleInputPassword1" style="color: black">Image</label>
                                          <img :src="'/image/'+editUser.user_img" style="height:60px;width:60px;border:1px solid #999" alt="">
                                          <input required @change="onImageChangedUpdate" type="file" class="form-control" placeholder="Password" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div> -->
                                        <button  type="submit" class="btn btn-default" @click.prevent="updateUser">Update</button>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" id="CloseUpdateModal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>





      <div  class="modal fade" id="ViewModal" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">View User</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Name</label>
                                          <p>{{editUser.name}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Email</label>
                                          <p>{{editUser.email}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Role</label>
                                         <p v-if="editUser.is_admin === 0">User</p>
                                         <p v-else>Admin</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1" style="color: black">Image</label><br>
                                          <img :src="'/image/'+editUser.user_img" style="height:300px;width:300px;border:1px solid #999" class="img-fluid" alt="">
                                        </div>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" id="CloseUpdateModal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>




<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="CloseDeleteModal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" @click.prevent="ConfirmDelete">Delete</button>
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
            users:[],
            name :'',
            email  :'',
			password  :'',
			user_img : '',
            is_admin: '',
            DeleteId: '',
            editUser: [],
            Errors: '',
        }
       },
       created(){
        this.getUsers();

       },
       methods:{

        ClearErrors(){
            this.Errors = '';
            this.password = '',
            this.email = ''
        },
        getUsers(){
            axios.get('/api/admin/allUsers')
            .then(res => {
             this.users = res.data;
             if(res.data){
              //  $("#datatable").DataTable();
             }
            // console.log(res.data)

              setTimeout(() => $("#datatable").DataTable(), 100);
            })
            .then(err => console.log(err))
        },
        onImageChanged(event){
			//console.log(event.target.files[0])
			this.user_img  = event.target.files[0]
		},
        onImageChangedUpdate(event){
			//console.log(event.target.files[0])
			this.editUser.user_img  = event.target.files[0]
		},
        change: function(e){
        var id = e.target.value;
        var name = e.target.options[e.target.options.selectedIndex].text;
        console.log('id ',id );
        console.log('name ',name );
    },
        addUser(){
            let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
            let formdata = new FormData();
            formdata.append('name',this.name)
            formdata.append('email',this.email)
            formdata.append('password',this.password)
            formdata.append('is_admin',this.is_admin)
            formdata.append('user_img',this.user_img)
           axios.post('/api/admin/adduser', formdata,config)
                .then(res => {
                    console.log(res)
                    this.$store.commit('setUserToken', res.data.token)
                    this.getUsers();
                    document.getElementById('CloseLoginModal').click();

                })
                .catch(err => {
                    console.log(err.response.data.errors.email)
                    this.Errors = err.response.data.errors.email;
                })
		},
            deleteUser(user){
			this.DeleteId = user;
       },
            ConfirmDelete(){
            var id = this.DeleteId;
			axios.post('/api/admin/deleteUser',{user_ids: this.DeleteId})
			.then(res => {
			console.log(res.data)
			document.getElementById('CloseDeleteModal').click();
			this.getUsers();
			this.$toaster.success('User deleted successfully.');
			 })
			 .catch(err =>{
				 console.log(err)
			 })
		},
            editClick(user) {
               // console.log(post.category.name)
               // console.log(JSON.stringify(post.category.name));
            this.editUser = user;
        },
        		updateUser(){
			let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
			let formdata = new FormData();
            formdata.append('name',this.editUser.name)
            formdata.append('email',this.editUser.email)
            formdata.append('id',this.editUser.id)
           // formdata.append('password',this.editUser.password)
            formdata.append('is_admin',this.editUser.is_admin)
            formdata.append('user_img',this.editUser.user_img)
			axios.post('/api/admin/updateuserinfo',formdata,config)
			.then(res => {
                document.getElementById('CloseUpdateModal').click();
                this.editUser.image = res.data.image
				this.getUsers();
                this.$toaster.success('User updated successfully.');
			})
		},
       }


};
</script>
