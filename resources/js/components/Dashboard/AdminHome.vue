<template>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-cyan text-center">
            <h1 class="font-light text-white">
              <i class="fas fa-user"></i>
            </h1>
            <h6 class="text-white">Total users : {{totalUsers}}</h6>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-success text-center">
            <h1 class="font-light text-white">
              <i class="fas fa-sticky-note"></i>
            </h1>
            <h6 class="text-white">Total posts : {{totalPosts}}</h6>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-danger text-center">
            <h1 class="font-light text-white">
              <i class="fa fa-list-alt"></i>
            </h1>
            <h6 class="text-white">Total categories : {{totalCategories}}</h6>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-info text-center">
            <h1 class="font-light text-white">
              <i class="fa fa-comment-alt"></i>
            </h1>
            <h6 class="text-white">Total comments : {{totalComments}}</h6>
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
            totalUsers :'',
            totalCategories :'',
            totalPosts :'',
            totalComments :'',
        }
       },
  created(){
       this.getStatistics();
},methods:{
getStatistics(){
            axios.get('/api/admin/getStatistics')
            .then(res => {
          //  console.log(res)
            this.totalPosts = res.data.posts;
            this.totalCategories = res.data.categories;
            this.totalUsers = res.data.users;
            this.totalComments = res.data.comments;
            })
            .then(err => console.log(err))
        }
  },
}
</script>
