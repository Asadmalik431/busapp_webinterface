<template>
	<div>
		<!-- <button :class="assignclass" @click="click(data,'assig_route')" title="Edit">
	        <span>
	            <i class="fas fa-road"></i>
	        </span>
	        &nbsp;
	        Assign Route
	    </button> -->
	    <button :class="classes" @click="click(data,'edit')" title="Edit">
	        <span>
	            <i class="fa fa-eye" aria-hidden="true"></i>
	        </span>
	        &nbsp;
	        Edit
	    </button>
	    <button  :class="editclass"  @click="click(data,'delete')" title="Delete">
	        <span>
	            <i class="fa fa-edit" aria-hidden="true"></i>
	        </span>
	        &nbsp;
	        Delete
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
			assignclass :{
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