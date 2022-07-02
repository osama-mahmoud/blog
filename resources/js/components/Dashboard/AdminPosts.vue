<template>
  <div class="container-fluid">
    <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-success btn-lg text-white" data-toggle="modal" data-target="#AddModal" @click="ClearErrors()">Add</button>
                <br><br>
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Posts</h5>
                    <div class="table-responsive">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
    <table class="table table-bordered" id="datatable">
      <thead>
        <tr>
          <th>No</th>
          <th>Title</th>
          <th>Category</th>
          <th>Image</th>
          <th>Created On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(post,i) in posts" :key="post.id">
          <td>{{ i+1  }}</td>
          <td>{{ post.title }}</td>
          <td>{{ post.category.name }}</td>
            <td><img :src="'/image/'+post.image" style="width:100px;height:60px;border:1px solid #e7e7e7" alt=""></td>
          <td>{{ post.created_at }}</td>
          <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditModal" @click="editClick(post)"><i class="mdi mdi-pencil"></i></button>
            <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#DeleteModal" @click="deletePost(post.id)"><i class="me-2 mdi mdi-delete"></i></button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ViewModal" @click="editClick(post)"><i class="me-2 mdi mdi-eye"></i></button>
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
                                  <h4 class="modal-title">Add Post</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Title</label>
                                          <input required v-model="title" type="text" class="form-control" placeholder="Enter Title" style="margin-top: 1px;">
                                          <span class="text-danger" v-if="Errors.title">{{ Errors.title[0] }}</span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Slug</label>
                                          <input v-model="slug" type="text" class="form-control" placeholder="Enter Slug" style="margin-top: 1px;">
                                          <span class="text-danger" v-if="Errors.slug">{{ Errors.slug[0] }}</span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Description</label>
                                          <textarea v-model="body" type="textarea" rows="7" class="form-control" placeholder="Enter Description" style="margin-top: 1px;"></textarea>
                                          <span class="text-danger" v-if="Errors.body">{{ Errors.body[0] }}</span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Category</label>
                                          <select class="form-control" aria-label="Default select example" v-model="category" required>
                                           <option value="" disabled selected>choose category</option>
                                           <option :value="category.id" v-for="category in categories" :key="category.id">
							            	 {{ category.name }}
							          	   </option>
                                          </select>
                                          <span class="text-danger" v-if="Errors.category_id">{{ Errors.category_id[0] }}</span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1" style="color: black">Image</label>
                                          <input required @change="onImageChanged" type="file" class="form-control" placeholder="Image" style="margin-top: 1px;">
                                          <span class="text-danger" v-if="Errors.image">{{ Errors.image[0] }}</span>
                                        </div>
                                        <button type="submit" class="btn btn-default" @click.prevent="addPost">Submit</button>
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
                                  <h4 class="modal-title">Edit Post</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Title</label>
                                          <input required v-model="editPost.title" type="text" class="form-control" placeholder="Enter Title" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Slug</label>
                                          <input v-model="editPost.slug" type="text" class="form-control" placeholder="Enter Slug" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Description</label>
                                          <textarea v-model="editPost.body" type="textarea" rows="7" class="form-control" placeholder="Enter Description" style="margin-top: 1px;"></textarea>
                                          <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Category</label>
                                          <select class="form-control" aria-label="Default select example" v-model="editPost.category_id" required>
                                           <option value="0" disabled selected>choose category</option>
                                           <option :value="category.id" v-for="category in categories" :key="category.id">
							            	 {{ category.name }}
							          	   </option>
                                          </select>
                                          <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1" style="color: black">Image</label>
                                          <img :src="'/image/'+editPost.image" style="height:60px;width:60px;border:1px solid #999" alt="">
                                          <input required @change="onImageChangedUpdate" type="file" class="form-control" placeholder="Password" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div>
                                        <button  type="submit" class="btn btn-default" @click.prevent="updatePost">Update</button>
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
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">View Post</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Title</label>
                                          <p>{{editPost.title}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Slug</label>
                                          <p>{{editPost.slug}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Description</label>
                                          <p>{{editPost.body}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Category</label>
                                         <p v-for="CatName in editPost">{{CatName.name}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1" style="color: black">Image</label><br>
                                          <img :src="'/image/'+editPost.image" style="height:300px;width:300px;border:1px solid #999" class="img-fluid" alt="">
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
            posts:[],
            categories:[],
            title :'',
            slug  :'',
			body  :'',
			image : '',
			category : '',
            DeleteId: '',
            editPost: [],
            Errors: [],
        }
       },
       created(){
        this.getPosts();
        this.getCategories();
       },
       methods:{
        ClearErrors(){
            this.Errors = [];
        },
        getPosts(){
            axios.get('/api/admin/allposts')
            .then(res => {
             this.posts = res.data;
              setTimeout(() => $("#datatable").DataTable(), 100);
            })
            .then(err => console.log(err))
        },
        getCategories(){
               axios.get('/api/admin/categories')
                .then(res => {
                 //   console.log(res.data)
                    this.categories = res.data;
                })
                .then(err => console.log(err))
		},
        onImageChanged(event){
			//console.log(event.target.files[0])
			this.image  = event.target.files[0]
		},
        onImageChangedUpdate(event){
			//console.log(event.target.files[0])
			this.editPost.image  = event.target.files[0]
		},
        addPost(){
			let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
			let formdata = new FormData();
            formdata.append('title',this.title)
            formdata.append('body',this.body)
            formdata.append('slug',this.slug)
            formdata.append('image',this.image)
			formdata.append('category',this.category)
			axios.post('/api/admin/addPost',formdata,config)
			.then(res => {
				console.log(res)
                this.Errors = [];
				this.title = '';
				this.body = '';
				this.category = '';
				this.image = '';
                this.getPosts();
				document.getElementById('CloseLoginModal').click();
                this.$toaster.success('Post added successfully.');
			}).catch((error) => {
                         this.Errors = error.response.data.errors;
                        // this.success = false;
                    });
		},
            deletePost(PostId){
			this.DeleteId = PostId;
       },
            ConfirmDelete(){
            var id = this.DeleteId;
			axios.post('/api/admin/deletePosts',{posts_ids: this.DeleteId})
			.then(res => {
			console.log(res.data)
			document.getElementById('CloseDeleteModal').click();
			this.getPosts();
			this.$toaster.success('Post deleted successfully.');
			 })
			 .catch(err =>{
				 console.log(err)
			 })
		},
            editClick(post) {
               // console.log(post.category.name)
               // console.log(JSON.stringify(post.category.name));
            this.editPost = post;
        },
        		updatePost(){
			let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
			let formdata = new FormData();
            formdata.append('title',this.editPost.title)
            formdata.append('slug',this.editPost.slug)
            formdata.append('id',this.editPost.id)
            formdata.append('body',this.editPost.body)
            formdata.append('image',this.editPost.image)
			formdata.append('category',this.editPost.category.id)
			axios.post('/api/admin/updatePost',formdata,config)
			.then(res => {
                document.getElementById('CloseUpdateModal').click();
                this.editPost.image = res.data.image
				this.getPosts();
                this.$toaster.success('Post updated successfully.');
			})
		},
       }


};
</script>
