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
                                                        <img :src="'/images/'+post.image" alt="">
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
                                                        <h4>{{post.comments_count}} comments</h4>
                                                    </div>
                                                </div>
                                                <div class="all-comments">
                                                    <div class="view-comments" v-for="(comment,i) in post.comments" :key="i">
                                                        <div class="comments">
                                                            <div class="author-thumb">
                                                                <img src="images/author-comment1.jpg" alt="">
                                                            </div>
                                                            <div class="comment-body">
                                                                <h6 v-if="comment.user">{{comment.user.name}}</h6>
                                                                <span class="date">{{comment.added_at}}</span>
                                                                <a href="#" class="hidden-xs">Reply</a>
                                                                <p>{{comment.body}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divide-line">
                                                <img src="images/div-line.png" alt="" />
                                                </div>
                                            <div class="leave-comment">
                                                <div class="leave-one">
                                                    <h4>Leave a comment</h4>
                                                </div>
                                            </div>
                                            <div class="leave-form">
                                                <form action="#" method="post" class="leave-comment">
                                                    <input type="hidden" name="" v-model="post_id"></input>
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
                                        <div class="col-md-3 col-md-offset-1">
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
     return {
       post:'',
       body:'',
       post_id : '',
       comments:[]
     }
   },
   created(){
     this.getPost();
   //  this.updateToken();
   },
   methods:{
     getPost(){
      axios.get('/api/posts/'+this.$route.params.slug)
      .then(res =>{
        console.log(res)
        this.post = res.data
        this.post_id = this.post.id;
        this.comments = this.post.comments
      })
      .catch(err =>{
        console.log(err)
      })
     },
     addComment(){
       let {body,post_id} = this;
       axios.post('/api/comment/create',{body,post_id})
       .then(res => {
         console.log(res)
         this.comments.unshift(res.data)
       })
     },
},

}
</script>
