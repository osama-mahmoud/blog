<template>
  <div class="container-fluid">
    <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-success btn-lg text-white" data-bs-toggle="modal" data-bs-target="#AddModal" @click="ClearErrors()">Add</button>
                <br><br>
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <div class="table-responsive">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
    <table class="table table-bordered" id="datatable">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Slug</th>
          <th>Created On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(category,i) in categories" :key="category.id">
          <td>{{ i+1  }}</td>
          <td>{{ category.name }}</td>
          <td>{{ category.slug }}</td>
          <td>{{ category.created_at }}</td>
          <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditModal" @click="editClick(category)"><i class="mdi mdi-pencil"></i></button>
            <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#DeleteModal" @click="deletePost(category.id)"><i class="me-2 mdi mdi-delete"></i></button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewModal" @click="editClick(category)"><i class="me-2 mdi mdi-eye"></i></button>
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
                                  <h4 class="modal-title">Add Category</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Name</label>
                                          <input required v-model="name" type="text" class="form-control" placeholder="Enter Title" style="margin-top: 1px;">
                                          <span class="text-danger" v-if="Errors.name">{{ Errors.name[0] }}</span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Slug</label>
                                          <input v-model="slug" type="text" class="form-control" placeholder="Enter Slug" style="margin-top: 1px;">
                                          <span class="text-danger" v-if="Errors.slug">{{ Errors.slug[0] }}</span>
                                        </div>
                                        <button type="submit" class="btn btn-primary" @click.prevent="addCategory">Submit</button>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CloseLoginModal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>




                          <div  class="modal fade" id="EditModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Category</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Name</label>
                                          <input required v-model="editCategory.name" type="text" class="form-control" placeholder="Enter Title" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Slug</label>
                                          <input v-model="editCategory.slug" type="text" class="form-control" placeholder="Enter Slug" style="margin-top: 1px;">
                                          <span class="text-danger"></span>
                                        </div>
                                        <button  type="submit" class="btn btn-primary" @click.prevent="updateCategory">Update</button>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CloseUpdateModal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>





      <div  class="modal fade" id="ViewModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">View Category</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Name</label>
                                          <p>{{editCategory.name}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Slug</label>
                                          <p>{{editCategory.slug}}</p>
                                        </div>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CloseUpdateModal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>




<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Delete</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>      </div>
      <div class="modal-body">
        Are You Sure
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="CloseDeleteModal" data-bs-dismiss="modal">Close</button>
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
            categories:[],
            name :'',
            slug  :'',
            DeleteId: '',
            editCategory: [],
            Errors: [],
        }
       },
       created(){
        this.getCategories();
       },
       methods:{
        ClearErrors(){
            this.Errors = [];
        },
        getCategories(){
            axios.get('/api/admin/categories')
            .then(res => {
             this.categories = res.data;
             if(res.data){
              //  $("#datatable").DataTable();
             }
            // console.log(res.data)

              setTimeout(() => $("#datatable").DataTable(), 100);
            })
            .then(err => console.log(err))
        },
        addCategory(){
			let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
			let formdata = new FormData();
            formdata.append('name',this.name)
            formdata.append('slug',this.slug)
			axios.post('/api/admin/addCategory',formdata,config)
			.then(res => {
				console.log(res)
                this.Errors = [];
				this.title = '';
                this.getCategories();
				document.getElementById('CloseLoginModal').click();
                this.$toaster.success('Category added successfully.');
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
			axios.post('/api/admin/deleteCategory',{category_ids: this.DeleteId})
			.then(res => {
			console.log(res.data)
			document.getElementById('CloseDeleteModal').click();
			this.getCategories();
			this.$toaster.success('Category deleted successfully.');
			 })
			 .catch(err =>{
				 console.log(err)
			 })
		},
            editClick(category) {
               // console.log(post.category.name)
               // console.log(JSON.stringify(post.category.name));
            this.editCategory = category;
        },
        		updateCategory(){
			let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
			let formdata = new FormData();
            formdata.append('name',this.editCategory.name)
            formdata.append('slug',this.editCategory.slug)
            formdata.append('id',this.editCategory.id)
			axios.post('/api/admin/updateCategory',formdata,config)
			.then(res => {
                document.getElementById('CloseUpdateModal').click();
				this.getCategories();
                this.$toaster.success('Category updated successfully.');
			})
		},
       }


};
</script>
