<template>
  <div class="container-fluid">
    <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Comments</h5>
                    <div class="table-responsive">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
    <table class="table table-bordered" id="datatable">
      <thead>
        <tr>
          <th>No</th>
          <th>Comment</th>
          <th>Post</th>
          <th>User</th>
          <th>Created On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(commnet,i) in commnets" :key="commnet.id">
          <td>{{ i+1  }}</td>
          <td>{{ commnet.body }}</td>
          <td>{{ commnet.posts.title }}</td>
          <td>{{ commnet.users.name }}</td>
          <td>{{ commnet.created_at }}</td>
          <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditModal" @click="editClick(commnet)"><i class="mdi mdi-pencil"></i></button>
            <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#DeleteModal" @click="deleteComment(commnet.id)"><i class="me-2 mdi mdi-delete"></i></button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewModal" @click="editClick(commnet)"><i class="me-2 mdi mdi-eye"></i></button>
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







                          <div  class="modal fade" id="EditModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Comment</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Comment</label>
                                          <textarea required v-model="editComment.body" type="text" class="form-control" placeholder="Enter Title" style="margin-top: 1px;"></textarea>
                                          <span class="text-danger"></span>
                                        </div>
                                        <button  type="submit" class="btn btn-primary" @click.prevent="updateComment">Update</button>
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
                                  <h4 class="modal-title">View Comment</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Comment</label>
                                          <p>{{editComment.body}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">User</label>
                                          <p>{{commentUser}}</p>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Post</label>
                                          <p>{{commentPost}}</p>
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
            commnets:[],
            body :'',
            DeleteId: '',
            editComment: [],
            Errors: [],
            commentUser:'',
            commentPost:''
        }
       },
       created(){
        this.getCommnets();
       },
       methods:{
        ClearErrors(){
            this.Errors = [];
        },
        getCommnets(){
            axios.get('/api/comments')
            .then(res => {
             this.commnets = res.data;
             if(res.data){
              //  $("#datatable").DataTable();
             }
            // console.log(res.data)

              setTimeout(() => $("#datatable").DataTable(), 100);
            })
            .then(err => console.log(err))
        },
            deleteComment(CommentId){
			this.DeleteId = CommentId;
       },
            ConfirmDelete(){
            var id = this.DeleteId;
          //  console.log(id)
		  //  axios.delete('/api/comments/'+ this.DeleteId)
           // axios.post('/api/comments/'+id,{_method: 'delete'})
           //  axios.delete('api/comments/' + id)
            axios.delete(`/api/comments/${id}`)
			.then(res => {
			console.log(res.data)
			document.getElementById('CloseDeleteModal').click();
			this.getCommnets();
			this.$toaster.success('Comment deleted successfully.');
			 })
			 .catch(err =>{
				 console.log(err)
			 })
		},
            editClick(commnet) {
               // console.log(post.category.name)editComment
               // console.log(JSON.stringify(post.category.name));
            this.editComment = commnet;
            this.commentUser = this.editComment.users.name;
            this.commentPost = this.editComment.posts.title;
        },
        		updateComment(){
			let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
			let formdata = new FormData();
            formdata.append('_method', 'PATCH');
            formdata.append('body',this.editComment.body)
            formdata.append('id',this.editComment.id)
            axios.post(`/api/comments/${this.editComment.id}`,formdata)
			.then(res => {
                document.getElementById('CloseUpdateModal').click();
				this.getCommnets();
                this.$toaster.success('Comment updated successfully.');
			})
		},
       }


};
</script>
