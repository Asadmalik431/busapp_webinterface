<style >
    .notification_main_div{
        margin-left: 15%;
        margin-top: 6%;
        border: 1px solid grey;
        margin-right: 15%;
    }
    .notification_inner_div{
        padding-left: 35%;
        border: 1px solid grey;
        padding-top: 2%;
        padding-bottom: 2%;
        background: lightgrey;
        cursor: pointer;
    }
    .notification_inner_div_read{
        padding-left: 35%;
        border: 1px solid grey;
        padding-top: 2%;
        padding-bottom: 2%;
        background: white;
        cursor: not-allowed;
    }
</style>
<template id ="notification-footer">
    <div class="notification_main_div ">

        <div  v-for="notification in allNotifications" :key="notification.id" v-if="notification.reader_id == null" class="notification_inner_div">
            <div class="content_div">{{notification.name}} Start Trip </div>
        </div>
        <div   v-else class="notification_inner_div_read">
            <div class="content_div">{{notification.name}} Start Trip </div>
        </div>
     </div>
</template>

<script type="text/javascript">
// import { myVar } from './../app.js'
	export default {
	data() {
        return {
            allNotifications : {},
		}
    },  
    methods: {
       
    },
    mounted(){
        let _this = this;
        axios({
            method: 'get',
            url: api_url +'/get_all_notifications_with_status/',
        })
        .then(function (response) {
            // returnData = JSON.parse(response); 
            _this.allNotifications = JSON.parse(response.data._notifications)
        })
        .catch(function (response) {
        });
    },
    props:['count','message'],
}
</script>