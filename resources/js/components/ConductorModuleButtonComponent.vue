<template>
	<div>
	    <button :class="classes" @click="click(data,'edit')" title="Edit">
	        <span>
	            <i class="fa fa-edit" aria-hidden="true"></i>
	        </span>
	        &nbsp;
	        
	    </button>
	    <button  :class="editclass"  @click="click(data,'delete')" title="Delete">
	        <span>
	            <i class="fas fa-trash" aria-hidden="true"></i>
	        </span>
	        &nbsp;
	        
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
			assign_bus : {
				'btn': true,
                'btn-warning': true,
                'btn-sm': true,
			},
			add_child : {
				'btn': true,
                'btn-success': true,
                'btn-sm': true,
			}
        	
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