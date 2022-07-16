<template>
<div id="product-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>{{post.title}}</h2>
                                <img src="images/under-heading.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <div id="single-blog" class="page-section first-section">
                        <div class="container">
                            <div class="row">
                                <div class="product-item col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                                <div class="image">
                                                    <div class="image-post">
                                                        <img :src="'/image/'+post.image" alt="">
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title">
                                                        <h3 v-if="post.user">{{post.user.name}}</h3>
                                                        <span class="subtitle">Added at {{post.added_at}}</span>
                                                    </div>
                                                    <p>
                                                        {{post.body}}
                                                    </p>
                                                </div>
                                                <div class="divide-line">
                                                <img src="images/div-line.png" alt="" />
                                                </div>
                                                <div class="comments-title">
                                                    <div class="comment-section">
                                                        <h4>{{totalComent}} comments</h4>
                                                    </div>
                                                </div>
                                                <div class="all-comments">
                                                    <div class="view-comments" v-for="(comment,i) in post.comments" :key="i">
                                                        <div class="comments">
                                                            <div class="author-thumb">
                                                                <img :src="'/image/'+comment.userImage" style="width:100px;height:60px;border:1px solid #e7e7e7" alt="">
                                                            </div>
                                                            <div class="comment-body">
                                                                <h6 v-if="comment.user">{{comment.user.name}}</h6>
                                                                <span class="date">{{comment.added_at}}</span>
                                                                <div v-if="isLogged">
                                                                <div v-if="comment.user.id == user.id">
                                                                <!-- <a  class="hidden-xs" data-toggle="modal" data-target="#EditModal" @click="editClick(comment)">Edit</a> -->
                                                                <button style="float: right;margin: 1%;" class="btn btn-danger text-white" data-toggle="modal" data-target="#DeleteModal" @click="deleteComment(comment.id)">Delete</button>
                                                                <button style="float: right;margin: 1%;" class="btn btn-primary" data-toggle="modal" data-target="#EditModal" @click="editClick(comment)">Edit</button>
                                                                </div></div><div v-else></div>
                                                                <p>{{comment.body}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divide-line">
                                                <img src="images/div-line.png" alt="" />
                                                </div>
                                            <div v-if="isLogged">
                                            <div class="leave-comment">
                                                <div class="leave-one">
                                                    <h4>Leave a comment</h4>
                                                </div>
                                            </div>


                                            <div class="leave-form">
                                                <form action="#" method="post" class="leave-comment">
                                                    <input type="hidden" name="" v-model="post_id">
                                                    <!-- <div class="row">
                                                    <div class="name col-md-4">
                                                        <input type="text" name="name" id="name" placeholder="Name" />
                                                    </div>
                                                    <div class="email col-md-4">
                                                        <input type="text" name="email" id="email" placeholder="Email" />
                                                    </div>
                                                    <div class="subject col-md-4">
                                                        <input type="text" name="subject" id="subject" placeholder="Subject" />
                                                    </div>
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="text col-md-12">
                                                            <textarea name="text" placeholder="Comment" v-model="body"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="send">
                                                        <button type="submit" @click.prevent="addComment">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                            <div v-else class="leave-comment">
                                                <div class="leave-one">
                                                    <h4>Please Login to comment</h4>
                                                </div>
                                            </div>
                        <a class="btn btn-primary" v-if="!isLogged" href="#" data-toggle="modal" data-target="#Register">Register</a>
                        <a class="btn btn-primary" v-if="!isLogged" href="#" data-toggle="modal" data-target="#Login">Login</a>
                        <login></login>
                        <register></register>
                          <div  class="modal fade" id="EditModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit Comment</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="color: black">Comment</label>
                                          <textarea required v-model="editComment.body" type="text" class="form-control" placeholder="Enter Title" style="margin-top: 1px;"></textarea>
                                          <span class="text-danger"></span>
                                        </div>
                                        <button  type="submit" class="btn btn-default" @click.prevent="updateComment">Update</button>
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
                                        <!-- <div class="col-md-3 col-md-offset-1">
                                            <div class="side-bar">
                                                <div class="recent-post">
                                                    <h4>Recent Posts</h4>
                                                    <div class="posts">
                                                        <div class="recent-post">
                                                            <div class="recent-post-thumb">
                                                                <img src="images/recent-post1.jpg" alt="">
                                                            </div>
                                                            <div class="recent-post-info">
                                                                <h6><a href="#">Vestibulum molestie odio sit amet</a></h6>
                                                                <span>24 Sep 2084</span>
                                                            </div>
                                                        </div>
                                                        <div class="recent-post">
                                                            <div class="recent-post-thumb">
                                                                <img src="images/recent-post2.jpg" alt="">
                                                            </div>
                                                            <div class="recent-post-info">
                                                                <h6><a href="#">Vivamus mattis quam eget urna tincidunt</a></h6>
                                                                <span>22 Sep 2084</span>
                                                            </div>
                                                        </div>
                                                        <div class="recent-post">
                                                            <div class="recent-post-thumb">
                                                                <img src="images/recent-post3.jpg" alt="">
                                                            </div>
                                                            <div class="recent-post-info">
                                                                <h6><a href="#">Curabitur in nunc eget neque posuere</a></h6>
                                                                <span>21 Sep 2084</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>
<script>
import { mapState } from 'vuex'
export default {
   data(){
     return {
       post:'',
       body:'',
       post_id : '',
       comments:[],
       user_id:'',
       totalComent: '',
       currentUserId: '',
       editComment: [],
       DeleteId: '',
     }
   },
   created(){
     this.setUser();
     this.getPost();
     this.updateToken();
   },
   mounted(){
        this.setUser();
        this.getPost();
        this.updateToken();
       },
   methods:{
     updateToken(){
       let token =JSON.parse(localStorage.getItem('userToken'));
       this.$store.commit('setUserToken',token)
     },
    editClick(commnet) {
            this.editComment = commnet;
        },
        updateComment(){
			let formdata = new FormData();
            formdata.append('_method', 'PATCH');
            formdata.append('body',this.editComment.body)
            formdata.append('id',this.editComment.id)
            axios.post(`/api/comments/${this.editComment.id}`,formdata)
			.then(res => {
                document.getElementById('CloseUpdateModal').click();
                this.$toaster.success('Comment updated successfully.');
			})
		},
            deleteComment(CommentId){
			this.DeleteId = CommentId;
       },
        ConfirmDelete(){
            var id = this.DeleteId;
            axios.delete(`/api/comments/${id}`)
			.then(res => {
			document.getElementById('CloseDeleteModal').click();
            this.getPost();
			this.$toaster.success('Comment deleted successfully.');
			 })
			 .catch(err =>{
				 console.log(err)
			 })
		},
     setUser(){
               if(this.isLogged){
                  axios.get('/api/user')
                        .then(res => {
                            this.getPost();
                            this.currentUserId = res.data.user.id;
                        })
               }
     },
     getPost(){
      axios.get('/api/posts/'+this.$route.params.slug)
      .then(res =>{
        this.post = res.data
        this.post_id = this.post.id;
        this.comments = this.post.comments
        this.totalComent = this.post.comments_count
      })
      .catch(err =>{
        console.log(err)
      })
     },
     addComment(){
       let {body,post_id} = this;
       axios.post('/api/comments',{body,post_id})
       .then(res => {
         this.comments.unshift(res.data)
         this.totalComent ++
         this.$toaster.success('Comment added successfully.');
       })
     }
},
computed:{
    ...mapState({
            user: 'user'
        }),
     isLogged(){
        return this.$store.getters.isLogged;
     }
   }
}
</script>
