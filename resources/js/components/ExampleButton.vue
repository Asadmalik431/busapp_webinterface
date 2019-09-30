<template>
	<div>
	    <button :class="classes" @click="click(data,'view_child')" title="view">
	        <span>
	            <i class="fa fa-eye" aria-hidden="true"></i>
	        </span>
	        &nbsp;

	    </button>
	    <button  :class="editclass"  @click="click(data,'edit_parent')" title="Edit Parent">
	        <span>
	            <i class="fa fa-edit" aria-hidden="true"></i>
	        </span>
	        &nbsp;
	     
	    </button>
		<button  :class="add_child"  @click="click(data,'add_child')" title="Add Childs">
	        <span>
				<i class="fas fa-child" aria-hidden="true"></i>
	            <!-- <i class="fa fa-edit" aria-hidden="true"></i> -->
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
                'btn-success': true,
                'btn-sm': true,
			},
			
			add_child : {
				'btn': true,
                'btn-warning': true,
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