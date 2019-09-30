<template>
    <div class="container">
        <div class="row  mt-5">
            <div class="col-md-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{total_parents}}</h3>
                        <p>Total Parents</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <router-link to="parents" class="small-box-footer">
                        More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </router-link>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{total_drivers}}</h3>
                        <p>Total Drivers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <router-link to="drivers" class="small-box-footer">
                        More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </router-link>
                </div>
            </div>

            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{total_busses}}</h3>
                        <p>Total buses</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <router-link to="busses" class="small-box-footer">
                        More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </router-link>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- <p class="text-center">
                    <strong>Goal Completion</strong>
                </p> -->

                <div class="progress-group">
                    Busses Assign To Drivers
                    <span class="float-right"><b>{{bus_assign}}</b>/{{total_busses}}</span>
                    <div class="progress progress-sm">
                    <div class="progress-bar bg-primary" style="width: 80%"></div>
                    </div>
                </div>
                <!-- /.progress-group -->

                <div class="progress-group">
                    <span class="progress-text">Routes Assign To Busses</span>
                    <span class="float-right"><b>{{route_assign}}</b>/{{total_routes}}</span>
                    <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width: 60%"></div>
                    </div>
                </div>

                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">Today Present Drivers</span>
                    <span class="float-right"><b>1</b>/{{total_drivers}}</span>
                    <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" style="width: 50%"></div>
                    </div>
                </div>
                <!-- /.progress-group -->
                
                <button @click="get_ses_id">test</button>
                
            </div>
        </div>
    </div>
</template>

<script>
// import VueRouter from 'vue-router';
// var router = new VueRouter() ;
    window.Vue = require('vue');
    import VueRouter from 'vue-router';
    import router from './../routes';
    import TestMixin from '../mixins/helper';
    Vue.use(VueRouter);
    export default {
        mixins: [ TestMixin ],
        data() {
            return {
                total_parents : 0,
                total_drivers : 0,
                total_busses  : 0,
                total_routes  : 0,
                bus_assign    : 0,
                route_assign  : 0,
                id            : '',
                email         : '',
                type          : '',
                photo         : ''
            }
        },

        methods :{
            get_ses_id(){
                var data ={
                    client_id : 2,
                    client_secret : 'nAEzC28Ebo46RxkENDH2ZJLhkYgAC6igmvsSsbB9',
                    grant_type    : 'password',
                    username      : 'asadmalik431@gmail.com' ,
                    password      : '123456',
                    scope         : '*'
                }
                axios.post('https://bustracker.cicm.pk/busapp/oauth/token', data)
                .then(response => {
                    console.log(response);
                }) 
            },
            onLoad(){
                let _this = this;
                axios({
                    method: 'get',
                    url: api_url +'/get_dashboard_data',
                })
                .then(function (response) {
                    // console.log(response.data.total_parents);
                    _this.total_parents = response.data.total_parents;
                    _this.total_drivers = response.data.total_drivers;
                    _this.total_busses  = response.data.total_busses;
                    _this.total_routes  = response.data.total_routes;
                    _this.bus_assign    = response.data.bus_assign;
                    _this.route_assign  = response.data.route_assign;
                })
                .catch(function (response) {

                });
                console.log('sdkls');
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
            
        },
        mounted() {
            // console.log('Component mounted.')
            Notification.requestPermission( permission => {
                // let notification = new Notification('Trip', {
                //     body: 'Arslan start trip'
                // });

                // notification.onclick = () => {
                //     window.open(window.location.href);
                // };
            });
        },
        created() {
            this.onLoad();
            this.check_session();
            this.get_all_notification();
            this.listenNotification();
            // alert(this.id);
            
        },
    }
</script>
