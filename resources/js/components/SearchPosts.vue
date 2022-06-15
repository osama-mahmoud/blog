<template>

<div>
 <div class="search-box">
                        <form name="search_form" method="get" class="search_form">
                            <input id="search" type="text" v-model="searchpost" />
                            <input type="submit" id="search-button" />
                        </form>
                    </div>
                <ul class="list-group"><div v-for="post in posts" :key="post.id">
                        <li class="list-group-item"><h4>
                            <router-link :to="'/post/'+post.slug">


                            {{ post.slug  }}
                        </router-link></h4></li>
                        </div>
                    </ul>
</div>



                        <!-- <div id="latest-blog">
                <div class="container">
                       <div class="search-box">
                        <form name="search_form" method="get" class="search_form">
                            <input id="search" type="text" v-model="searchpost" />
                            <input type="submit" id="search-button" />
                        </form>
                    </div>
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
                                        <h4><router-link :to="'/post/'+post.slug">{{ post.slug  }}</router-link></h4>
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
            </div> -->



</template>
<script>
    export default {
       data(){
        return{
            posts:[],
            searchpost:'',
        }
       },
       watch:{
          searchpost(query){
                  if(query.length > 0){
                    console.log(query)
                    axios.get('/api/searchposts/'+query)
                    .then(res => {
                       this.posts = res.data;
                    })
                    .catch(err => {
                      console.log(err)
                    })
                  }else{
                  //  let oldposts = JSON.parse(localStorage.getItem('posts')) ;
                   // this.posts = oldposts;
                  }
          }
        },
       created() {
      //  this.searchpost();

       },
       methods:{

        getPosts(){
            axios.get('/api/posts')
            .then(res => {
             this.posts = res.data;
            // localStorage.setItem('posts',JSON.stringify(0));
            })
            .then(err => console.log(err))
        }
       }
    }
</script>





<!-- <template>
    <div>
        <input type="text" v-model="keywords">
        <ul v-if="results.length > 0">
            <li v-for="result in results" :key="result.id" v-text="result.title"></li>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            keywords: null,
            results: []
        };
    },
    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },
    methods: {
        fetch() {
            axios.get('/api/searchposts/', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});
        }
    }
}
</script> -->
