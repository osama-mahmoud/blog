<template>
<div id="latest-blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Categories</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6" v-for="category in categories" :key="category.id">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/blogpost1.jpg" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><router-link :to="'/categories/'+category.slug">{{ category.name  }}</router-link></h4>
                                        <span>{{ category.created_at }}</span>
                                    </div>
                                    <div class="content-hide">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>
<script>
export default{
 data(){
        return{
            categories:[]
        }
       },
       mounted(){
        this.getCategories();
       },
       methods:{
        getCategories(){
            axios.get('/api/categories/allcategories')
            .then(res => {this.categories = res.data;})
            .then(err => console.log(err))
        }
       }


}
</script>
