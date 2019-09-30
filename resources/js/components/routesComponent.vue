<style type="text/css">
    .mb-3 div:nth-child(even) {
            opacity: 0;
    }
    .btn_class{
        margin-top: 0px;
        margin-bottom: -50px
    }
    .add_buttn{
        margin-left: 3%;
    }
    .btn_style{
         margin-left: 3%;
    }.input_style{
        margin-left : 6%;
        margin-top  : 6%;
        z-index: 100009000;
    }
    .pac-container { z-index: 100000; }
    .vue-time-picker-panel-inner{
        padding: 2px;
        width: 301%;
        /* height: 46px; */
        border-radius: 4px;
    }
    .timepickerror{
        margin-left: 4%;
        margin-top: -15px;
        font-size: 12px;
        color: red;
        margin-bottom: 5px;
    }
    .div_for_scroll{
        float: left;
        overflow-y: auto;
        height: 150px;
    }
    
</style>
<template>
    <div class="container">
        <button @click = "newModal" class="btn_class btn btn-success">+ Add New</button>
        <div class="row  justify-content-center mt-5">
            <div class="col-md-12">
                <data-table
                    ref="routesvuetable"
                    :url= "dataTableUrl"
                    :per-page="perPage"
                    :columns="columns">
                </data-table>
            </div>
        </div>
        <div class="modal fade" id="RoutesModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" >
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateroutes() : createroute()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="location" v-model="form.location" type="text" name="location"
                                    placeholder="Route"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                                <has-error :form="form" field="location"></has-error>
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
              <div class="modal fade" id="RoutesModalstation" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" >
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <form @submit.prevent=" save_station()"> -->
                        <div class="modal-body">
                           
                            <!-- <div class="row ">
                                <div class="col-xs-2 offset-xs-5 add_buttn">
                                    <button type="button" v-on:click="addNewStation" class="btn btn-block btn-success">
                                        Add +
                                    </button>
                                </div>
                            </div> -->
                            <!-- <div v-for="(Station, index) in Stations" :key="Station.price"> -->
                                <label for="">Reach Time</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            
                                            <TimePicker  :time.sync="myTime"></TimePicker>
                                        </div>
                                        
                                    </div>
                                    <span class="timepickerror">{{timepickerror}}</span>
                                </div>
                                <label for="">Station </label>
                                <div class="row">
                                    <!-- <div class="col-xs-3 btn_style">
                                        <label>&nbsp;</label>
                                        <button type="button" v-on:click="removeStation(index)" class="btn btn-block btn-danger">
                                            Rem -
                                        </button>
                                    </div> -->
                                    <div class="col-md-12 col-xs-9 " >
                                     
                                        <!-- <vue-google-autocomplete
                                            ref="address"
                                            id="map"
                                            classname="form-control"
                                            placeholder="Please type your address"
                                            v-on:placechanged="getAddressData"
                                            country="pk"
                                        
                                        >
                                        </vue-google-autocomplete> -->
                                        <div class="form-group">
                                        <gmap-autocomplete ref="autocomplete" :options="autocompleteOptions"
                                         class="form-control" @place_changed="updatePlace"></gmap-autocomplete>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group col-md-9 col-xs-9 input_style">
                                        <label>Station</label>
                                        <input v-model="Station.station" type="text"
                                            name="Stations[][station]" class="form-control" placeholder="Station">
                                    </div> -->
                                   
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 div_for_scroll">
                                        <ul class="list-group">
                                            <draggable  @change="log(routeStations)" v-model="routeStations" group="people" @start="drag=true" @end="drag=false">
                                                    <li class="list-group-item" v-for="element in routeStations" :key="element.id">{{element.name}}</li>
                                            </draggable>
                                        </ul>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                        </div>                                               
                    <!-- </form> -->
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
    import routesModuleButtonComponent from './routeModuleButtonComponent.vue';
    import VueGoogleAutocomplete from 'vue-google-autocomplete';
    import draggable from 'vuedraggable';
    import TimePicker from 'vue-timepicker';

    export default {
        data() {
            return {
                timepickerror : '',
                myTime        : '',
                routeStations : {},
                autocompleteOptions: {
                    componentRestrictions: {
                        country: [
                            'pk',
                        ],
                    },
                },
                Station: {
                    station: '',
                },
                address       : '',
                route_add_stat: {},
                geo_input_id  : '',
                route_id      : 0,
                address       : {},
                Stations      : [],
                editmode      : true,
                model_heading : 'Add Bus Model',
                perPage       : ['3', '25', '50'],
                dataTableUrl  : api_url +"/get_routes_data",
                columns: [
                    
                    {
                        label: 'Id',
                        name: 'id',
                        filterable: true,
                    },
                    {
                        label: 'Location',
                        name: 'location',
                        filterable: true,
                    },
                   
                    {
                        label: '',
                        name: 'View',
                        filterable: false,
                        component: routesModuleButtonComponent,
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
                    location  : '',
                    station   : this.Stations
                   
                })
                ,form_stations: new form({
                    station        :'',
                    
                   
                })
            }
        },
         components: {
            draggable,
            VueGoogleAutocomplete,
            TimePicker: TimePicker
        },
        mounted() {          
            console.log();
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
            log(arr){
                let page_number = this.getPageNumber();
                let _this       = this;
                axios({
                    method: 'post',
                    url: api_url +'/update_stations_list',
                    data: {
                        'stattions' : arr,
                        
                        'route_id'  : _this.route_id,
                        },
                })
                .then(function (response) {
                    _this.$refs.routesvuetable.getData(_this.$refs.routesvuetable.checkUrlForPagination(page_number));
                    toast.fire({
                        type: 'success',
                        title: "Places Arranged Successfully"
                    });
                    _this.routeStations = response.data.data;
                    
                })
                .catch(function (response) {
                    //handle error
                    console.log(response);
                });
            },
            // updateCenter(location) {
            //     console.log(location.lat());
            //     this.mapCenter = {
            //     lat: location.lat(),
            //     lng: location.lng(),
            //     }
            // },
            updatePlace(place) {
                let _this = this;
                this.address['route']     = place.name;
                this.address['latitude']  = place.geometry.location.lat();
                this.address['longitude'] = place.geometry.location.lng();
                let page_number           = this.getPageNumber();
                let timepick = $('.vue-time-picker-panel-input').val();
                // console.log(timepick);
                if(timepick == ''){
                    _this.timepickerror = 'select reach time for station ';
                    _this.$refs.autocomplete.$refs.input.value = '';
                    // alert('time required');
                }
                else{
                    _this.timepickerror = '';
                    axios({
                    method: 'post',
                    url: api_url +'/save_stations',
                    data: {
                        'address'  : _this.address,
                        'route_id' : _this.route_id,
                        'timepick' : timepick,
                        },
                    })
                    .then(function (response) {

                        if(response.data.success == 1){
                            // console.log(_this.$refs.address);
                            // console.log(response.data.data);
                            toast.fire({
                                type: 'success',
                                title: 'Station Added successfully'
                            });
                            _this.form.reset();
                            _this.$Progress.finish();
                            _this.routeStations = response.data.data;
                            _this.$refs.routesvuetable.getData(_this.$refs.routesvuetable.checkUrlForPagination(page_number));
                        }
                        else{
                            toast.fire({
                                type: 'warning',
                                title: response.data.data
                            });
                        }
                        _this.$refs.autocomplete.$refs.input.value = '';
                        $('.vue-time-picker-panel-input').val('');
                    })
                    .catch(function (response) {
                        //handle error
                        console.log(response);
                    });
                }
                // console.log(this.$refs.autocomplete.$refs.input.value);
               
                // console.log(place.name);                              
                // this.updateCenter(place.geometry.location);
            },
            // save_station(){
            //     let address = $("#pac-input").val();
            //     this.form_stations.station  = address;
            //      this.form_stations.post(api_url +'/save_stations')
            //     .then(({ data }) =>{
            //         $('#RoutesModal').modal('hide');
            //         toast.fire({
            //             type: 'success',
            //             title: 'Update successfully'
            //         })
            //         this.$Progress.finish();
            //         // console.log(this.$refs.vuetable);
            //         this.$refs.routesvuetable.getData(this.$refs.routesvuetable.checkUrlForPagination(page_number));
            //     })
            //     .catch(() => {

            //     })
            //     console.log($("#pac-input").val())
            // },
            getAddressData: function (addressData, placeResultData, id) {
                this.address = addressData;
                let _this    = this;
                _this.route_add_stat = {};
                // this.$refs.address.clear();
                console.log(this.$refs.address);
                axios({
                    method: 'post',
                    url: api_url +'/save_stations',
                    data: {
                        'address'  : _this.address,
                        'route_id' : _this.route_id,
                        },
                })
                .then(function (response) {
                    console.log(_this.$refs.address);
                    console.log(response.data.data);
                    toast.fire({
                        type: 'success',
                        title: 'Station Added successfully'
                    });
                    _this.form.reset();
                    _this.$Progress.finish();
                    _this.route_add_stat = response.data.data;
                    
                })
                .catch(function (response) {
                    //handle error
                    console.log(response);
                });
                
            },
            addNewStation: function () {
                
            this.Stations.push(Vue.util.extend({}, this.Station))
            let stations_lenght = this.Stations.length;
            this.geo_input_id   = 'id_'+ stations_lenght;
            console.log(this.geo_input_id);
            },
            removeStation: function (index) {
            Vue.delete(this.Stations, index);
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
                    this.model_heading = 'Edit Route Model';
                    this.editmode      = true;
                    this.form.reset();
                    $('#RoutesModal').modal('show');
                    this.form.fill(data); 
                }
                else if(button_click == 'delete'){
                    let id = data.id;
                    console.log(id);
                    this.delete_route(id);
                }
                else if(button_click == 'add_stops'){
                    $('.vue-time-picker-panel-input').val('');
                    this.timepickerror = '';
                    this.routeStations = {};
                    this.route_id      = '';
                    this.route_id      = data.id;
                    this.routeStations = data.stations;
                    console.log( this.route_id);
                    console.log( this.routeStations);
                    $('#RoutesModalstation').modal('show');
                }
            },
            newModal(){
                this.Stations      = [];
                this.model_heading = 'Add Route Model';
                this.editmode      = false;
                this.form.reset();
                $('#RoutesModal').modal('show');
            },
            updateroutes(){
                this.$Progress.start();
                let page_number = this.getPageNumber();
                this.form.post(api_url +'/update_route_data')
                .then(({ data }) =>{
                    $('#RoutesModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.routesvuetable.getData(this.$refs.routesvuetable.checkUrlForPagination(page_number));
                })
                .catch(() => {

                })

            },
            delete_route(id){
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
                            url: api_url +'/delete_route',
                            data: {'id' : id},
                        })
                        .then(function (response) {
                            //handle success
                            _this.$refs.routesvuetable.getData(_this.$refs.routesvuetable.checkUrlForPagination(page_number));
                            console.log(page_number);
                        })
                        .catch(function (response) {
                            //handle error
                            console.log(response);
                        });
                    }
                })
                
            },
            createroute(){
                console.log(this.Stations);
                // if (this.Stations.length < 2) {
                //     toast.fire({
                //         type: 'warning',
                //         title: 'Please Add Atlease Two Stations'
                //     })
                // }
                // else{
                //     let count = 0 ;
                //     $.each(this.Stations, function(key, value) {
                //         if (value.station == '') {
                            
                //         }
                //         else{
                //             count ++;
                //         }
                //     });
                //     if(count < 2){
                //         toast.fire({
                //             type: 'warning',
                //             title: 'Please Fill Atlease Two Stations Values'
                //         })
                //     }
                //     else{
                //         this.form.station = this.Stations;
                //         this.form.post(api_url +'/update_route_data')
                //         .then(({ data }) =>{
                //             $('#RoutesModal').modal('hide');
                //             toast.fire({
                //                 type: 'success',
                //                 title: 'Update successfully'
                //             })
                //             this.$Progress.finish();
                //             // console.log(this.$refs.vuetable);
                //             this.$refs.routesvuetable.getData();
                //         })
                //         .catch(() => {

                //         })
                //     }
                    
                // }
                this.form.station = this.Stations;
                this.form.post(api_url +'/update_route_data')
                .then(({ data }) =>{
                    $('#RoutesModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.routesvuetable.getData();
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
            }
        },
        created() {
            //this.onLoad();
            this.check_session();
            
            // alert(this.id);
            
        },
    }
</script>
