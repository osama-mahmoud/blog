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
                        <div class="col-md-4 col-sm-6" v-for="categoryPost in categoryPosts" :key="categoryPost.id">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img :src="'/image/'+categoryPost.image" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><router-link :to="'/post/'+categoryPost.slug">{{ categoryPost.title  }}</router-link></h4>
                                        <span>{{ categoryPost.created_at }}</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>{{ categoryPost.body  }}</p>
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
            categoryPosts:[]
        }
       },
       mounted(){
        console.log('mounted');
        this.getCategories();
       },
       methods:{
        getCategories(){
            axios.get('/api/categories/'+this.$route.params.slug)
            .then(res =>
            {
             this.categoryPosts = res.data;console.log(res);
            }
            )
            .then(err => console.log(err))
        }
       }
    }
</script>
