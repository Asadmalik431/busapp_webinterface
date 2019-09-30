<style type="text/css">
    .mb-3 div:nth-child(even) {
            opacity: 0;
    }
    .btn_class{
        margin-top: 0px;
        margin-bottom: -50px
    }
    .errors_message{
        color: red;
        font-size: 13px;
        margin-left: 9px;
        position: absolute;
    }
</style>
<template>
    <div class="container">
        
    
        <button @click = "newModal" class="btn_class btn btn-success">+ Add New</button>
        
        <div class="row  justify-content-center mt-5">
            <div class="col-md-12">
                <data-table
                    ref="driversvuetable"
                    :url= "dataTableUrl"
                    :per-page="perPage"
                    :columns="columns">
                </data-table>
            </div>
        </div>
        <!-- <vue-google-autocomplete
            ref="address"
            id="map"
            classname="form-control"
            placeholder="Please type your address"
            v-on:placechanged="getAddressData"
            country="pk"
           
        >
        </vue-google-autocomplete> -->
        
        <div class="modal fade" id="driverModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updatedriver() : createdriver()">
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
                                <span id="driver_name" class="errors_message"></span>
                            </div>
                            <!-- <div class="form-group">
                            <date-picker name="ddd" :date="startTime" :option="timeoption" :limit="limit"></date-picker>
                            </div>
                            <div class="form-group">
                            <date-picker name="ddd" :date="endtime" :option="timeoption" :limit="limit"></date-picker>
                            </div>
                            <input type="hidden" v-model="form.startTime" name="starttime"> -->
                            
                            <div class="form-group">
                                <input id="email" v-model="form.email" type="text" name="email"
                                    placeholder="Email"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                                <span id="driver_email" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="phonenumber" v-model="form.phonenumber" type="text" name="phonenumber"
                                    placeholder="Contact"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('phonenumber') }">
                                <has-error :form="form" field="phonenumber"></has-error>
                                <span id="driver_phonenumber" class="errors_message"></span>
                            </div>
                             <div class="form-group">
                                <input id="phonenumber" v-model="form.password" type="password" name="password"
                                    placeholder="Enter Password"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                                <span id="driver_password" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="idcardnumber" v-model="form.idcardnumber" type="text" name="idcardnumber"
                                    placeholder="CNIC #"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('idcardnumber') }">
                                <has-error :form="form" field="idcardnumber"></has-error>
                                <span id="driver_idcardnumber" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="eye_sight" v-model="form.eye_sight" type="text" name="eye_sight"
                                    placeholder="Eye Sigth"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('eye_sight') }">
                                <has-error :form="form" field="eye_sight"></has-error>
                                <span id="driver_eye_sight" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="medical_category" v-model="form.medical_category" type="text" name="medical_category"
                                    placeholder="Medical Category"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('medical_category') }">
                                <has-error :form="form" field="medical_category"></has-error>
                                <span id="driver_medical_category" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="register_school" v-model="form.register_school" type="text" name="register_school"
                                    placeholder="Registered School"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('register_school') }">
                                <has-error :form="form" field="register_school"></has-error>
                                <span id="driver_register_school" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="register_branch" v-model="form.register_branch" type="text" name="register_branch"
                                    placeholder="Registered Branch"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('register_branch') }">
                                <has-error :form="form" field="register_branch"></has-error>
                                <span id="driver_register_branch" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.address" name="address" id="address"
                                placeholder="Address Of Driver (Optional)"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('address') }"></textarea>
                                <has-error :form="form" field="address"></has-error>
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
        <div class="modal fade" id="assignBusModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{asign_bus_model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  
                    <form @submit.prevent="editmode_assign ? assign_bus_to_drivers() : createdriver()">
                        <div class="modal-body">
                            <input type="hidden" v-model="assigBusForm.driver_id" name="driver_id">
                            <input type="hidden" v-model="assigBusForm.id" name="main_route_id">
                            <div class="form-group">
                                <select name="bus_id" v-model="assigBusForm.bus_id" id="bus_id" class="form-control" :class="{ 'is-invalid': assigBusForm.errors.has('bus_id') }">
                                    <option value="">Select Bus</option>
                                    <option v-for="bus in bus_data" :key="bus.id" :value="bus.id">{{bus.bus_no}}</option>
                                    
                                </select>
                                <has-error :form="assigBusForm" field="bus_id"></has-error>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="route_id" v-model="assigBusForm.route_id" id="route_id" class="form-control" :class="{ 'is-invalid': assigBusForm.errors.has('route_id') }">
                                            <option value="" >Select Route</option>
                                            <option v-for="route in route_data" :key="route.id" :value="route.id" >{{route.location}}</option>
                                            
                                        </select>
                                        <has-error :form="assigBusForm" field="route_id"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <date-picker v-model="assigBusForm.starttime"  :date="startTime" :option="starttimeoption" :limit="limit"></date-picker>
                                    <div class="form-group">
                                        <input type="hidden" v-model="assigBusForm.starttime" name="starttime" id="starttime" class="form-control" :class="{ 'is-invalid': assigBusForm.errors.has('starttime') }">
                                        <has-error :form="assigBusForm" field="starttime"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <date-picker  :date="endtime" :option="endtimeoption" :limit="limit"></date-picker>
                                    <div class="form-group">
                                        <input type="hidden" v-model="assigBusForm.endtime" name="endtime" id="endtime" class="form-control" :class="{ 'is-invalid': assigBusForm.errors.has('endtime') }">
                                        <has-error :form="assigBusForm" field="endtime"></has-error>
                                    </div>
                                </div> 
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
    import draggable from 'vuedraggable'
    import driverModuleButtonComponent from './driverModuleButtonComponent.vue';
    import myDatepicker from 'vue-datepicker'
    import VueGoogleAutocomplete from 'vue-google-autocomplete'
    export default {
        data() {
            return {
                bus_data                : {},
                driver_assign_bus       : {},
                driver_errors           : {},
                file                    : {},
                route_data              : {},
                editmode                : true,
                editmode_assign         : true,
                model_heading           : 'Add Model',
                asign_bus_model_heading : 'Assign Bus ',
                perPage                 : ['3', '25', '50'],
                dataTableUrl            : api_url+"/get_drivers_data",
                address                 : '',
                columns: [
                    
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
                        label: 'NIC Number',
                        name: 'idcardnumber',
                        filterable: true,
                    },
                    {
                        label: 'Contact',
                        name: 'phonenumber',
                        filterable: true,
                    },
                    {
                        label: '',
                        name: 'View',
                        filterable: false,
                        component: driverModuleButtonComponent,
                        click: this.editModal,
                        classes: { 
                            'btn': true,
                            'btn-primary': true,
                            'btn-sm': true,
                        }  
                    },
                ],
                form: new form({
                    id                :'',
                    name              : '',
                    email             : '',
                    phonenumber       : '',
                    idcardnumber      : '',
                    address           : '',
                    eye_sight         : '',
                    medical_category  : '',
                    register_school   : '',
                    register_branch   : '',
                    image             : '',
                    password          : ''
                }),
                assigBusForm: new form({
                    driver_id    :'',
                    bus_id       : '',
                    starttime    : '',
                    endtime      : '',
                    route_id     : '',
                    id           : ''
                }),
                // for Vue 2.0
                startTime: {
                    time: ''
                },
                endtime: {
                    time: ''
                },
                starttimeoption: {
                    type: 'min',
                    week: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                    month: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    format: 'YYYY-MM-DD hh:mm',
                    placeholder: 'Select Start Time',
                    inputStyle: {
                    'display': 'inline-block',
                    'padding': '6px',
                    'line-height': '22px',
                    'font-size': '16px',
                    'border': '2px solid #fff',
                    'box-shadow': '0 1px 3px 0 rgba(0, 0, 0, 0.2)',
                    'border-radius': '2px',
                    'color': '#5F5F5F'
                    },
                },
                endtimeoption: {
                    type: 'min',
                    week: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                    month: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    format: 'YYYY-MM-DD hh:mm',
                    placeholder: 'Select End Time',
                    inputStyle: {
                    'display': 'inline-block',
                    'padding': '6px',
                    'line-height': '22px',
                    'font-size': '16px',
                    'border': '2px solid #fff',
                    'box-shadow': '0 1px 3px 0 rgba(0, 0, 0, 0.2)',
                    'border-radius': '2px',
                    'color': '#5F5F5F'
                    },
                },
                limit: [{
                    type: 'fromto',
                    from: this.getCurrentDate(),
                }]
            }
        },
        mounted() {
            console.log('Component mounted.');
            console.log(this.$refs.address);
            // this.$refs.address.focus();
        },
        components: {
        'date-picker': myDatepicker,
            draggable,
            VueGoogleAutocomplete
        },
        methods : {
            log(columns){
                console.log(columns)
            },
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
            } ,
            getAddressData: function (addressData, placeResultData, id) {
                
                this.address = addressData;
                console.log(this.address);
            },
            getCurrentDate (){
                var cur_date_vue = new Date();
                var month = ('0' + (cur_date_vue.getMonth() + 1)).slice(-2);
                var date = ('0' + cur_date_vue.getDate()).slice(-2) - 1;
                var year = cur_date_vue.getFullYear();
                var date_formated_vue = year + '-' + month + '-' + date;
                return date_formated_vue;
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
                console.log(data);
                if (button_click == 'edit') {
                    console.log(data);
                    this.model_heading = 'Edit Driver Model';
                    this.editmode      = true;
                    
                    this.form.reset();
                    $('#driverModal').modal('show');
                    this.form.fill(data); 
                    this.form.password = '';
                }
                else if(button_click == 'delete'){
                    let driver_id = data.id;
                    this.delete_driver(driver_id);
                }
                else if (button_click == 'assign_bus'){
                    this.driver_assign_bus = {};
                    this.driver_assign_bus = data.driver_assign_bus;
                    console.log(data);
                    let driver_id = data.id;
                    this.assign_bus(driver_id);
                    this.assigBusForm.reset();
                    this.assigBusForm.fill(data.driver_assign_bus);
                }
                else if (button_click == 'add_child'){
                    this.add_child(data);
                }
            },
            add_child(data){
                
            },
            newModal(){
                console.log(api_url);
                this.model_heading = 'Add Driver Model';
                this.editmode      = false;
                this.form.reset();
                $('#driverModal').modal('show');
            },
            updatedriver(){
                this.$Progress.start();
                let page_number = this.getPageNumber();
                let data = new FormData();
                data.set('image', this.file);
                data.set('id', this.form.id);
                data.set('name', this.form.name);
                data.set('email', this.form.email);
                data.set('phonenumber', this.form.phonenumber);
                data.set('idcardnumber', this.form.idcardnumber);
                data.set('address', this.form.address);
                data.set('eye_sight', this.form.eye_sight);
                data.set('medical_category', this.form.medical_category);
                data.set('register_school', this.form.register_school);
                data.set('register_branch', this.form.register_branch);
                data.set('password', this.form.password);
                axios.post(api_url +'/update_driver_data', data)
                .then(response => {
                    $('#driverModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.driversvuetable.getData(this.$refs.driversvuetable.checkUrlForPagination(page_number));
                    this.form.reset();
                }) 
                .catch(error => {
                    this.driver_errors =  error.response.data.errors;
                    $(".errors_message").html('');
                    $.each(this.driver_errors, function(key, value) {
                        $("#driver_"+key).html(value);
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
            delete_driver(driver_id){
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
                })
                
            },
            assign_bus(driver_id){
                
                this.assigBusForm.reset();
                let _this = this;
                this.assigBusForm.driver_id = driver_id;
                axios({
                    method: 'post',
                    url: api_url +'/assign_bus',
                    data: {'id' : driver_id},
                })
                .then(function (response) {
                    //handle success
                    console.log(response.data);
                    _this.bus_data   = response.data.busses;
                    _this.route_data = response.data.routes;
                    $('#assignBusModal').modal('show');
                })
                .catch(function (response) {
                    //handle error
                    console.log(response);
                });
            },
            assign_bus_to_drivers(){
                let page_number             = this.getPageNumber();
                this.assigBusForm.starttime = this.startTime.time;
                this.assigBusForm.endtime   = this.endtime.time;
                this.assigBusForm.post(api_url +'/assign_bus_to_drivers')
                .then(({ data }) =>{
                    if (data.msg == 'Not_Available') {
                       toast.fire({
                            type: 'warning',
                            title: 'Bus Not Available At This Time'
                        })
                        this.$Progress.finish();
                    }
                    else{
                        $('#assignBusModal').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'Update successfully'
                        })
                        this.$Progress.finish();
                        this.$refs.driversvuetable.getData(this.$refs.driversvuetable.checkUrlForPagination(page_number));
                    }
                   
                })
                .catch(() => {

                })
            },
            createdriver(){
                // 
                let data = new FormData();
                data.set('image', this.file);
                data.set('name', this.form.name);
                data.set('email', this.form.email);
                data.set('phonenumber', this.form.phonenumber);
                data.set('idcardnumber', this.form.idcardnumber);
                data.set('address', this.form.address);
                data.set('eye_sight', this.form.eye_sight);
                data.set('medical_category', this.form.medical_category);
                data.set('register_school', this.form.register_school);
                data.set('register_branch', this.form.register_branch);
                data.set('password', this.form.password);
                axios.post(api_url +'/update_driver_data', data)
                .then(response => {
                     $('#driverModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.driversvuetable.getData();
                    this.form.reset();
                }) 
                .catch(error => {
                    this.driver_errors =  error.response.data.errors;
                    $(".errors_message").html('');
                    $.each(this.driver_errors, function(key, value) {
                        $("#driver_"+key).html(value);
                    });
                });
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
        created() {
            // this.onLoad();
            this.check_session();
            
            // alert(this.id);
            
        },
    }
</script>
