<template>
	<div>
	    <!-- <button :class="classes" @click="click(data,'edit')" title="Edit">
	        <span>
	            <i class="fa fa-eye" aria-hidden="true"></i>
	        </span>
	        &nbsp;
	        Edit
	    </button> -->
	    <button  :class="editclass"  @click="click(data,'delete')" title="Delete">
	        <span>
	            <i class="fa fa-edit" aria-hidden="true"></i>
	        </span>
	        &nbsp;
	        Delete
	    </button>
		<button  :class="stopclass"  @click="click(data,'add_stops')" title="Delete">
	        <span>
	            <i class="fa fa-edit" aria-hidden="true"></i>
	        </span>
	        &nbsp;
	        Add Stop's
	    </button>
	    
  	</div>
</template>

<script type="text/javascript">
	export default {
	data() {
        return {
        	editclass :{
        		'btn': true,
                'btn-danger': true,
                'btn-sm': true,
			},
			stopclass :{
        		'btn': true,
                'btn-success': true,
                'btn-sm': true,
        	},
        	
		}
	},
    props: {
        data: {},
        name: {},
        click: {},
        classes: {},
    }
}
</script>