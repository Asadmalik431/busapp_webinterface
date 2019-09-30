<style type="text/css">
    .widget-user-header{
        height: 170px
    }
</style>
<template>
    <div class="container">
        
        <div class="row justify-content-center " style="margin-top: 7%;">
            <div class="col-md-12">
            <div class="card">
              
              <div class="card-body">
                <div class="tab-content">
                
                  <!-- /.tab-pane -->
            
                  <!-- /.tab-pane -->

                  <div class="tab-pane active show" id="settings">
                    <form class="form-horizontal"  @submit.prevent="update_admin()">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input v-model="form.name" type="text" name="name"
                              placeholder="Name "
                              class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        </div>
                          <has-error :form="form" field="name" ></has-error>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                          <input readonly v-model="form.email" type="text" name="email"
                              placeholder="Email "
                              class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        </div>
                          <has-error :form="form" field="email" ></has-error>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                          <input v-model="form.password" type="password" name="password"
                              placeholder="Password "
                              class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        </div>
                          <has-error :form="form" field="password" ></has-error>
                      </div>
    

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
        </div>
    </div>
</template>

<script>
    export default {
      data() {
          return {
              form: new form({
                id   : '',
                name : '',
                email: '',
                password: '',
                // csrf : document.head.querySelector('meta[name="csrf-token"]').content
                  
              })
          }
      },
      mounted() {
          console.log('Component mounted.')
      },
      methods :{
        get_user_data(){
          let _this = this;
          let user_id = document.head.querySelector('meta[name="user-id"]').content;
          axios({
              method: 'post',
              url: api_url +'/get_admin_info',
              data: {'id' : user_id},
          })
          .then(function (response) {
              //handle success
              console.log(response);
              _this.form.reset();
              _this.form.fill(response.data); 
          })
          .catch(function (response) {
              //handle error
              console.log(response);
          });
        },
        update_admin(){
          let data = new FormData();
          // data.set('image', this.file);
          data.set('id', this.form.id);
          data.set('name', this.form.name);
          data.set('email', this.form.email);
          data.set('password', this.form.password);
          axios.post(api_url +'/update_admin', data)
          .then(response => {
              //  $('#driverModal').modal('hide');
              toast.fire({
                  type: 'success',
                  title: 'Updated successfully'
              })
              this.$Progress.finish();
      
          }) 
          .catch(error => {
              
          });
        }
      },
      created(){
        this.get_user_data();
      }
    }
</script>
