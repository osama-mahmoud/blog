<template>
<div id="latest-blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Latest blog posts</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6" v-for="post in posts" :key="post.id">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/blogpost1.jpg" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><router-link :to="'/post/'+post.slug">{{ post.title  }}</router-link></h4>
                                        <span>{{ post.created_at }}</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>{{ post.body  }}</p>
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
            posts:[]
        }
       },
       mounted(){
        console.log('mounted');
        this.getPosts();
       },
       methods:{
        getPosts(){
            axios.get('/api/posts')
            .then(res => {
             this.posts = res.data;
            })
            .then(err => console.log(err))
        }
       }
    }
</script>
