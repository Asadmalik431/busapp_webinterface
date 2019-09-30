<template id ="notification-footer">
	<a href="#" @click ="allNotifications" class="dropdown-item dropdown-footer">See All Notifications</a>
</template>

<script type="text/javascript">
// import { myVar } from './../app.js'
	export default {
	data() {
        return {

		}
    },  
    methods: {
       allNotifications(){
           this.$router.push({ path: 'all_notifications' })
       }
    },
    mounted(){
        
    },
    
}
</script>