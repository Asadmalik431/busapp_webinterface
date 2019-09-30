<template>
    <span>
         
    </span>  
</template>

<script>
    export default {
        data(){
            return {
               pos : 0,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods :{
            counter (){
                this.pos = this.pos +1;
                // console.log(this.pos);
            },
           
        },
        props :['bus_data','bus_columns','bus_book_seats']
    }
</script>
