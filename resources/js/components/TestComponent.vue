<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card card-info">
                  <div class="card-header" v-for ="component in components">
                    <h3 class="card-title">{{component.name}}</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" @submit.prevent="chatJoin()">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName3" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                              <input v-model="form.name" type="text" name="name"
                                    placeholder="Name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                              <input v-model="form.email" type="email" name="email"
                                    placeholder="Email"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                          </div>
                          
                         <!--  <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                <label class="form-check-label" for="exampleCheck2">Remember me</label>
                              </div>
                            </div>
                          </div> -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info pull-right">Join Chat</button>
                      
                    </div>
                    <!-- /.card-footer -->
                  </form>
                </div>
                <!-- <div v-for ="component in components" class="card" >
                    <div  class="card-header">{{component.component}}</div>

                    <div class="card-body">
                        {{component.message}}
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                form: new form({
                    name : '',
                    email: '',
                   
                }),
                components : [
                    {
                    name : "Chat Form" ,
                    message   : "I'm an example component Test."
                    },
                ]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods :{
            chatJoin(){
                console.log(this.form);
            }
        }
    }
</script>
