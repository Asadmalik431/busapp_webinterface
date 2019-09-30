<style type="text/css">
    .mb-3 div:nth-child(even) {
            opacity: 0;
    }
    .btn_class{
        margin-top: 0px;
        margin-bottom: -50px
    }
</style>
<template>
    <div class="container">
        
        <button @click = "newModal" class="btn_class btn btn-success">+ Add New</button>
        <div class="row  justify-content-center mt-5">
            <div class="col-md-12">
                <data-table
                    ref="busvuetable"
                    :url= "dataTableUrl"
                    :per-page="perPage"
                    :columns="columns">
                </data-table>
            </div>
        </div>
        
        <div class="modal fade" id="BusModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updatebus() : createbus()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="bus_no" v-model="form.bus_no" type="text" name="bus_no"
                                    placeholder="Bus Number"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('bus_no') }">
                                <has-error :form="form" field="bus_no"></has-error>
                            </div>
                            <div class="form-group">
                                <input id="bus_model" v-model="form.bus_model" type="text" name="bus_model"
                                    placeholder="Bus Model"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('bus_model') }">
                                <has-error :form="form" field="bus_model"></has-error>
                            </div>
                            <div class="form-group">
                                <input min="0" id="capacity" v-model="form.capacity" type="number" name="capacity"
                                    placeholder="Bus Capacity"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('capacity') }">
                                <has-error :form="form" field="capacity"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="bus_column" v-model="form.bus_column" id="bus_column" class="form-control" :class="{ 'is-invalid': form.errors.has('bus_column') }">
                                    <option selected  value="">Select Bus Column</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <has-error :form="form" field="bus_column"></has-error>
                                <span id="child_bus_id" class="errors_message"></span>
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
        <div class="modal fade" id="BusRouteAssignModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="routeAssign()">
                        <div class="modal-body">
                            <div class="form-group">
                                <select name="route" v-model="routeform.route" id="route" class="form-control" :class="{ 'is-invalid': form.errors.has('route') }">
                                    <option value="admin">Ichra Stop </option>
                                </select>
                                <has-error :form="form" field="route"></has-error>
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
    window.Vue = require('vue');
    import VueRouter from 'vue-router';
    import router from './../routes';
    Vue.use(VueRouter);
    import busModuleButtonComponent from './busModuleButtonComponent.vue';
    export default {
        data() {
            return {
                editmode      : true,
                model_heading : 'Add Bus Model',
                perPage: ['3', '25', '50'],
                dataTableUrl : api_url +"/get_busses_data",
                columns: [
                    
                    {
                        label: 'Bus Number',
                        name: 'bus_no',
                        filterable: true,
                    },
                    {
                        label: 'Bus Model',
                        name: 'bus_model',
                        filterable: true,
                    },
                    {
                        label: 'Bus Capacity',
                        name: 'capacity',
                        filterable: true,
                    },
                    {
                        label: 'Total Drivers',
                        name: 'total_drivers',
                        filterable: true,
                    },
                    {
                        label: '',
                        name: 'View',
                        filterable: false,
                        component: busModuleButtonComponent,
                        click: this.editModal,
                        classes: { 
                            'btn': true,
                            'btn-primary': true,
                            'btn-sm': true,
                        }

                        
                    },
                ],
                form: new form({
                    id        :'',
                    bus_no    : '',
                    bus_model : '',
                    capacity  : '',
                    bus_column: ''
                   
                }),
                routeform: new form({
                    route        :'',
                    
                   
                })
            }
        },
        mounted() {
            console.log('Component mounted.');
            console.log(base_url);

        },
        methods : {
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
            check(){
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
                alert(page_number);
            },
            editModal(data,button_click){
                if (button_click == 'edit') {
                    console.log(data);
                    this.model_heading = 'Edit Bus Model';
                    this.editmode      = true;
                    this.form.reset();
                    $('#BusModal').modal('show');
                    this.form.fill(data); 
                }
                else if(button_click == 'delete'){
                    let bus_id = data.id;
                    this.delete_bus(bus_id);
                }
                else if(button_click == 'assig_route'){
                    // this.getRoutes(data);
                    $("#BusRouteAssignModal").modal('show');
                    console.log(data);
                }
            },
            newModal(){
                this.model_heading = 'Add Bus Model';
                this.editmode      = false;
                this.form.reset();
                $('#BusModal').modal('show');
            },
            updatebus(){
                this.$Progress.start();
                let page_number = this.getPageNumber();
                this.form.post(api_url +'/update_bus_data')
                .then(({ data }) =>{
                    $('#BusModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.busvuetable.getData(this.$refs.busvuetable.checkUrlForPagination(page_number));
                    console.log(datttta.data);
                })
                .catch(() => {

                })

            },
            delete_bus(bus_id){
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
                            url: api_url +'/delete_bus',
                            data: {'id' : bus_id},
                        })
                        .then(function (response) {
                            //handle success
                            _this.$refs.busvuetable.getData(_this.$refs.busvuetable.checkUrlForPagination(page_number));
                            console.log(page_number);
                        })
                        .catch(function (response) {
                            //handle error
                            console.log(response);
                        });
                    }
                })
                
            },
            createbus(){
                this.form.post(api_url +'/update_bus_data')
                .then(({ data }) =>{
                    $('#BusModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.busvuetable.getData();
                })
                .catch(() => {

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
            },
            getRoutes(data){
                axios({
                    method: 'post',
                    url: api_url +'/delete_driver',
                    data: {'id' : driver_id},
                })
                .then(function (response) {
                    //handle success
                    _this.$refs.driversvuetable.getData(_this.$refs.driversvuetable.checkUrlForPagination(page_number));
                    console.log(page_number);
                })
                .catch(function (response) {
                    //handle error
                    console.log(response);
                });
            }
        },
        created() {
            //this.onLoad();
            this.check_session();
            
            // alert(this.id);
            
        },
    }
</script>
