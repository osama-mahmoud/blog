<template>
<div id="latest-blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Search</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="page.data">
                        <div class="col-md-4 col-sm-6"  v-for="SearchResultForm in page.data" :key="SearchResultForm.id">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img :src="'/image/'+SearchResultForm.image" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><router-link :to="'/post/'+SearchResultForm.slug">{{ SearchResultForm.slug  }}</router-link></h4>
                                        <span>{{ SearchResultForm.created_at }}</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>{{ SearchResultForm.body  }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <pagination :data="page" @pagination-change-page="getPosts"></pagination>
                </div>
            </div>
</template>
<script>
  export default {
    data(){
        return{
           page:{},
        }
       },
    methods:{
            getPosts(page = 1){
            axios.get('/api/searchposts/'+this.$route.query.arrgu+'?page=' + page, {Time: this.$route.query.t})
            .then(res => {
             this.page = res.data;
            })
            .then(err => console.log(err))
        }
        },
        mounted() {
            this.getPosts();
        }
  }
</script>
