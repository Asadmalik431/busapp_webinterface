<style >
    .point{
        cursor : pointer;
    }
</style>

<template>
    <span  class="message_context point">
        
    </span>
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
            
            $(".badg_count").html('');
             $(".message_count_custom").html('No New Notifications');
        },
        test(){
            alert('dfjkd')
        }
    },
    mounted(){
        // alert(this.count);
    },
    props:['count','message'],
}
</script>