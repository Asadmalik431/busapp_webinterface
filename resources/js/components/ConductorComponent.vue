<template>
    <div class="container">
        <button @click = "newModal()" class="btn_class btn btn-success">+ Add New</button>
        
        <div class="row  justify-content-center mt-5">
            <div class="col-md-12">
                <data-table
                    ref="conductorvuetable"
                    :url= "dataTableUrl"
                    :per-page="perPage"
                    :columns="columns">
                </data-table>
            </div>
        </div>
        <div class="modal fade" id="ConductorModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateconductor() : createconductor()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="image"  type="file" @change="selectFile" name="image"
                                    placeholder="Email"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
                                <has-error :form="form" field="image"></has-error>
                                
                            </div>
                            <div class="form-group">
                                <input id="name" v-model="form.name" type="text" name="name"
                                    placeholder="Name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                                <span id="conductor_name" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="email" v-model="form.email" type="text" name="email"
                                    placeholder="Email"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                                <span id="conductor_email" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="contact" v-model="form.contact" type="text" name="contact"
                                    placeholder="Contact"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('contact') }">
                                <has-error :form="form" field="contact"></has-error>
                                <span id="conductor_contact" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="password" v-model="form.password" type="password" name="password"
                                    placeholder="Enter Password"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                                <span id="conductor_password" class="errors_message"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>                                               
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TestMixin from '../mixins/helper';
    import ConductorModuleButtonComponent from './ConductorModuleButtonComponent.vue'
    export default {
        mixins: [ TestMixin ],
        data(){
            return {
                model_heading     : 'Add New Condutor',
                conductors_errors : {},
                file         : '',
                editmode     : false,
                perPage      : ['3', '25', '50'],
                dataTableUrl : api_url+"/get_conductors",
                columns      : [
                    
                    {
                        label: 'Name',
                        name: 'name',
                        filterable: true,
                    },
                    {
                        label: 'Email',
                        name: 'email',
                        filterable: true,
                    },
                    {
                        label: 'Contact',
                        name: 'contact',
                        filterable: true,
                    },
                    {
                        label: '',
                        name: 'View',
                        filterable: false,
                        component: ConductorModuleButtonComponent,
                        click: this.editModal,
                        classes: { 
                            'btn': true,
                            'btn-primary': true,
                            'btn-sm': true,
                        }  
                    },
                ],
                form: new form({
                    id       : '',
                    name     : '',
                    email    : '',
                    contact  : '',
                    password : '',
                   
                }),
                components : [
                   
                ]
            }
        },
        mounted() {
            // console.log('Component mounted.')
        },
        methods :{
            check_session(){
                let _this = this;
                let sess_id = document.head.querySelector('meta[name="user-id"]').content;
                if(sess_id == '1'){
                    // alert('hey baby session is haere')
                }
                else{
                    // alert('session not set ')
                    $(".login_condition").css("display","none");
                    $("#content_div_after_login").removeClass("content-wrapper");
                    router.push({ name: 'Login' });

                }
            },
            selectFile (e) {
                const file      = e.target.files[0];
                this.file = file;
                this.form.image = file;
                console.log(this.form.image);
            },
            newModal(){
                console.log(api_url);
                this.conductors_errors = {};
                $(".errors_message").html('');
                this.model_heading = 'Add New Condutor';
                this.editmode      = false;
                this.form.reset();
                $('#ConductorModal').modal('show');
            },
            editModal(data,button_click){
                console.log(data);
                if (button_click == 'edit') {
                    this.conductors_errors = {};
                    $(".errors_message").html('');
                    console.log(data);
                    this.model_heading = 'Edit Condutor Model';
                    this.editmode      = true;
                    
                    this.form.reset();
                    $('#ConductorModal').modal('show');
                    this.form.fill(data); 
                    this.form.password = '';
                }
                else if(button_click == 'delete'){
                    let conductor_id = data.id;
                    this.delete_conductor(conductor_id);
                }
            },
            createconductor(){
                // 
                let data = new FormData();
                data.set('image', this.file);
                data.set('name', this.form.name);
                data.set('email', this.form.email);
                data.set('contact', this.form.contact);
                data.set('password', this.form.password);
                axios.post(api_url +'/update_conductor_data', data)
                .then(response => {
                     $('#ConductorModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Created  Successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.conductorvuetable.getData();
                    this.form.reset();
                }) 
                .catch(error => {
                   this.$Progress.finish();
                   this.conductors_errors =  error.response.data.errors;
                    $(".errors_message").html('');
                    $.each(this.conductors_errors, function(key, value) {
                        $("#conductor_"+key).html(value);
                    });
                });
            },
            updateconductor (){
                this.$Progress.start();
                let page_number = this.getPageNumber();
                let data = new FormData();
                data.set('image', this.file);
                data.set('id', this.form.id);
                data.set('name', this.form.name);
                data.set('email', this.form.email);
                data.set('contact', this.form.contact);
                data.set('password', this.form.password);
                axios.post(api_url +'/update_conductor_data', data)
                .then(response => {
                    $('#ConductorModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.conductorvuetable.getData(this.$refs.conductorvuetable.checkUrlForPagination(page_number));
                    this.form.reset();
                })
                .catch(error => {
                    this.$Progress.finish();
                    this.conductors_errors =  error.response.data.errors;
                    $(".errors_message").html('');
                    $.each(this.conductors_errors, function(key, value) {
                        $("#conductor_"+key).html(value);
                    });
                });
                // this.form.post(api_url +'/update_driver_data')
                // .then(({ data }) =>{
                //     $('#driverModal').modal('hide');
                //     toast.fire({
                //         type: 'success',
                //         title: 'Update successfully'
                //     })
                //     this.$Progress.finish();
                //     // console.log(this.$refs.vuetable);
                //     this.$refs.driversvuetable.getData(this.$refs.driversvuetable.checkUrlForPagination(page_number));
                //     // console.log(datttta.data);
                // })
                // .catch(() => {

                // })

            },
            delete_conductor(driver_id){
                let page_number = this.getPageNumber();
                let _this       = this;
                 swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // Send request to the server
                    if (result.value) {
                        axios({
                            method: 'post',
                            url: api_url +'/delete_conductor',
                            data: {'id' : driver_id},
                        })
                        .then(function (response) {
                            //handle success
                            _this.$refs.conductorvuetable.getData(_this.$refs.conductorvuetable.checkUrlForPagination(page_number));
                            console.log(page_number);
                        })
                        .catch(function (response) {
                            //handle error
                            console.log(response);
                        });
                    }
                })
                
            },
            getPageNumber(){
                var text_page   = 
                                  $(".page-item.active").text();
                
                if (text_page == '') {
                    page_number = 1;
                }
                else{
                    text_page       = text_page .split(' ');
                    var page_number = text_page[16];
                    page_number     = parseInt(page_number);
                }
                return page_number;
            }
        },
        created(){
            this.get_all_notification();
            this.listenNotification();
        }
    }
</script>
