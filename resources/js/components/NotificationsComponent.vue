<template id ="notification-component">
	<a @click="seeNotifications" class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
    <span class="badge badge-warning navbar-badge badg_count"></span>
        <i class="far fa-bell"></i>
    </a>
</template>

<script type="text/javascript">
// import { myVar } from './../app.js'
	export default {
	data() {
        return {

		}
    },  
    methods: {
        seeNotifications(){
            axios({
                method: 'get',
                url: api_url +'/clear_notification/',
            })
            .then(function (response) {
                $(".badg_count").html('');
                $(".message_count_custom").html('No New Notifications');
            })
            .catch(function (response) {
            });
            
        }
    },
    mounted(){
        // alert(this.count);
    },
    props:['count','message'],
}
</script>