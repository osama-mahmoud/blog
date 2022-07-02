<template>
<div class="container-fluid">
  <div class="row">
            <div class="col-12">
              <div class="card">
                <form class="form-horizontal" enctype="multipart/form-data">
                  <div class="card-body">
                    <h4 class="card-title">Settings</h4>
                    <div class="form-group row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Site Name</label>
                      <div class="col-sm-9">
                        <input type="text" v-model="getSettings.site_name" class="form-control" id="fname" placeholder="First Name Here">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lname" class="col-sm-3 text-end control-label col-form-label">Site Email</label>
                      <div class="col-sm-9">
                        <input type="text" v-model="getSettings.contact_email" class="form-control" id="lname" placeholder="Last Name Here">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lname" class="col-sm-3 text-end control-label col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" v-model="getSettings.address" class="form-control" id="lname" placeholder="Last Name Here">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email1" class="col-sm-3 text-end control-label col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" v-model="getSettings.phone_number" class="form-control" id="lname" placeholder="Last Name Here">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email1" class="col-sm-3 text-end control-label col-form-label">Image</label>
                      <div class="col-sm-9">
                        <img :src="'/image/'+getSettings.image" style="height:60px;width:60px;border:1px solid #999" alt="">
                        <input required @change="onImageChangedUpdate" type="file" class="form-control" placeholder="Password" style="margin-top: 1px;">
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary" @click.prevent="updateSettings">
                        Submit
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
  </div>
</template>
<script>
export default {
        data(){
        return{
           getSettings: [],
           image : '',
        }
        },
        created(){
        this.getAllSettings();
        },methods:{
            onImageChangedUpdate(event){
			this.getSettings.image  = event.target.files[0]
		},
        getAllSettings(){
            axios.get('/api/allSettings')
            .then(res => {
             this.getSettings = res.data[0];
            })
            .then(err => console.log(err))
        },
        updateSettings(){
			let config ={
				headers :{"content-type" : 'multipart/form-data'}
			}
			let formdata = new FormData();
            formdata.append('site_name',this.getSettings.site_name)
            formdata.append('contact_email',this.getSettings.contact_email)
            formdata.append('id',this.getSettings.id)
            formdata.append('address',this.getSettings.address)
            formdata.append('image',this.getSettings.image)
			formdata.append('phone_number',this.getSettings.phone_number)
			axios.post('/api/admin/settings',formdata,config)
			.then(res => {
                this.getSettings.image = res.data.image
				this.getAllSettings();
                this.$toaster.success('Settings updated successfully.');
			})
		},
  },
}
</script>
