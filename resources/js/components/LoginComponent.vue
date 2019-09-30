<style >
.err_class{
    color: red;
    font-size: 12px;
    margin-left: 3%;
}

</style>
<template>
    <div class="login-box">
  <div class="login-logo">
       <a ><b>Bus</b>TRACKER</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit.prevent="LoginUser()">

        <input type="hidden" >
        <div class="form-group">
            <input v-model="form.email" type="text" name="email"
                placeholder="Email "
                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
            <span class="err_class" id="email_error"></span>
            <has-error :form="form" field="email" ></has-error>
        </div>
        <div class="form-group">
            <input v-model="form.password" type="password" name="password"
                placeholder="Password "
                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
            <span class="err_class" id="password_error"></span>
            <has-error :form="form" field="password" ></has-error>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="checkbox icheck">
              <label class="">
                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    
    </div>
  </div>
</div>
</template>

<script>
    window.Vue = require('vue');
    import VueRouter from 'vue-router';
    import router from './../routes';
    Vue.use(VueRouter);
    export default {
        data() {
            return {
                form: new form({
                    email: '',
                    password: '',
                    csrf : document.head.querySelector('meta[name="csrf-token"]').content
                   
                })
            }
        },
       
        methods :{
          LoginUser(){
                this.$Progress.start();
                this.form.post('login_make')
                .then(({ data }) =>{
                    if(data.err_email == 'yes'){
                        $("#email_error").html(data.email_message);
                    }

                    else if(data.err_pass == 'yes'){
                        $("#password_error").html(data.pass_message);
                    }
                    else {
                        $("#email_error").html("");
                        $("#password_error").html("");
                        console.log(data)
                        $(".login_condition").css("display","block");
                        $("#content_div_after_login").addClass("content-wrapper");
                        $("meta[name='user-id']").attr('content',data.sess_id);
                        // alert(document.head.querySelector('meta[name="user-id"]').content);
                        router.push({ name: 'Dashboard'})
                        toast.fire({
                            type: 'success',
                            title: 'Login Successfully'
                        })
                    }
                    
                    // router.push({ name: 'Dashboard'})
                    this.$Progress.finish();
                    
                })
                .catch(() => {
                    $("#password_error").html("");
                    $("#email_error").html("");
                    this.$Progress.finish();
                    // alert('dsfds')
                })
          },
          check_session(){
            let _this = this;
            let sess_id = document.head.querySelector('meta[name="user-id"]').content;
            if(sess_id == '1'){
                // alert('session not set ')
                $(".login_condition").css("display","block");
                $("#content_div_after_login").addClass("content-wrapper");
                router.push({ name: 'Dashboard' });
            }
            else{
               

            }
          },
        },
        mounted() {
          
        },
        created() {
          this.check_session();
        },
    }
</script>
