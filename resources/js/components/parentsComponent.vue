<style type="text/css">
.btn_class{
    margin-top: 0px;
    margin-bottom: -50px
}
.child_detail_box{
    margin-left: 9%;
    margin-top: 3%;
}
.no_child_style{
    margin-top: 38px;
    margin-bottom: 3rem;
    align-content: center;
    margin-left: 10%;
    font-weight: bold;
    font-size: 20px;
}
.bus_division{
    height: 122px;
    margin-top: 7%;
    width: 85%;
    border: 1px solid grey;
    margin-left: 8%;
    margin-bottom: 13%;
    text-align: center;
    background: lightyellow;
}
div.bus_division {
  display: block;
  padding: 10px;
}
 a  div.bus_division{
  display: block;
  background-color: lightyellow;;
  color : black;
}
 a:hover div.bus_division{
  display: block;
  background-color: #CCC;
  cursor: pointer;
  color: #000;
}
.scroll_div{
    /* overflow-y: auto; */
    height: 490px;
}
.row_custom {

    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: 3px;
}
.bus_box{
    margin-left: 30%;
}

*,
*:before,
*:after {
  box-sizing: border-box;
}

html {
  font-size: 16px;
}

.plane {
  margin: 20px auto;
  max-width: 281px;
  border: 1px solid black;
}

.cockpit {
  height: 250px;
  position: relative;
  overflow: hidden;
  text-align: center;
  border-bottom: 5px solid #d8d8d8;
}
.cockpit:before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  height: 500px;
  width: 100%;
  border-radius: 50%;
  border-right: 5px solid #d8d8d8;
  border-left: 5px solid #d8d8d8;
}
.cockpit h1 {
  width: 60%;
  margin: 100px auto 35px auto;
}

.exit {
  position: relative;
  height: 50px;
}
.exit:before, .exit:after {
  content: "EXIT";
  font-size: 14px;
  line-height: 18px;
  padding: 0px 2px;
  font-family: "Arial Narrow", Arial, sans-serif;
  display: block;
  position: absolute;
  background: green;
  color: white;
  top: 50%;
  transform: translate(0, -50%);
}
.exit:before {
  left: 0;
}
.exit:after {
  right: 0;
}

.fuselage {
  border-right: 5px solid #d8d8d8;
  border-left: 5px solid #d8d8d8;
}

ol {
  list-style: none;
  padding: 0;
  margin: 0px;
}

.seats {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: flex-start;
}

.seat {
  display: flex;
  flex: 0 0 14.28571428571429%;
  padding: 5px;
  position: relative;
}
.seat:nth-child(3) {
  margin-right: 14.28571428571429%;
}
.seat input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
.seat input[type="checkbox"]:checked + label {
  background: #bada55;
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat input[type="checkbox"]:disabled + label {
  background: #dddddd;
  text-indent: -9999px;
  overflow: hidden;
  padding: 0px 15px;
}
.seat input[type="checkbox"]:disabled + label:after {
  content: "X";
  text-indent: 0;
  position: absolute;
  top: 4px;
  left: 50%;
  transform: translate(-50%, 0%);
}
.seat input[type="checkbox"]:disabled + label:hover {
  box-shadow: none;
  cursor: not-allowed;
}
.seat label {
  display: block;
  position: relative;
  width: 100%;
  text-align: center;
  font-size: 14px;
  font-weight: bold;
  line-height: 1.5rem;
  padding: 4px 6px;
  background: #f42536;
  border-radius: 5px;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat label:before {
  content: "";
  position: absolute;
  width: 75%;
  height: 75%;
  top: 1px;
  left: 50%;
  transform: translate(-50%, 0%);
  background: rgba(255, 255, 255, 0.4);
  border-radius: 3px;
}
.seat label:hover {
  cursor: pointer;
  box-shadow: 0 0 0px 2px #5c6aff;
}

@-webkit-keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
.rubberBand {
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
}
/*	Reset & General
---------------------------------------------------------------------- */
* { margin: 0px; padding: 0px; }
body {
	background: #ecf1f5;
	font:14px "Open Sans", sans-serif; 
	text-align:center;
}

.tile{
	width: 100%;
	background:#fff;
	border-radius:5px;
	box-shadow:0px 2px 3px -1px rgba(151, 171, 187, 0.7);
	float:left;
  	transform-style: preserve-3d;
  	margin: 10px 5px;

}

.header{
	border-bottom:1px solid #ebeff2;
	padding:19px 0;
	text-align:center;
	color:#59687f;
	font-size:600;
	font-size:19px;	
	position:relative;
    background: ghostwhite;
}

.banner-img {
	padding: 5px 5px 0;
}

.banner-img img {
	width: 100%;
	border-radius: 5px;
}

.dates{
	border:1px solid #ebeff2;
	border-radius:5px;
	padding:20px 0px;
	margin:10px 20px;
	font-size:16px;
	color:#5aadef;
	font-weight:600;	
	overflow:auto;
}
.dates div{
	float:left;
	width:50%;
	text-align:center;
	position:relative;
}
.dates strong,
.stats strong{
	display:block;
	color:#adb8c2;
	font-size:11px;
	font-weight:700;
}
.dates span{
	width:1px;
	height:40px;
	position:absolute;
	right:0;
	top:0;	
	background:#ebeff2;
}
.stats{
	border-top:1px solid #ebeff2;
	background:#f7f8fa;
	overflow:auto;
	padding:15px 0;
	font-size:16px;
	color:#59687f;
	font-weight:600;
	border-radius: 0 0 5px 5px;
}
.stats div{
	border-right:1px solid #ebeff2;
	width: 33.33333%;
	float:left;
	text-align:center
}

.stats div:nth-of-type(3){border:none;}

div.footer {
	text-align: right;
	position: relative;
	margin: 20px 5px;
}

div.footer a.Cbtn{
	padding: 10px 25px;
	background-color: #DADADA;
	color: #666;
	margin: 10px 15px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	border-radius: 3px;
    cursor: pointer;
}

div.footer a.Cbtn-primary{
	background-color: #5AADF2;
	color: #FFF;
}

div.footer a.Cbtn-primary:hover{
	background-color: #7dbef5;
}

div.footer a.Cbtn-danger{
	background-color: #fc5a5a;
	color: #FFF;
}

div.footer a.Cbtn-danger:hover{
	background-color: #fd7676;
    
}
.errors_message{
    color: red;
    font-size: 13px;
    margin-left: 9px;
    position: absolute;
}

</style>
<template>
    <div class="container">
        <button @click = "newModal" class="btn_class btn btn-success">+ Add New</button>
        <div class="row  justify-content-center mt-5">
            <div class="col-md-12">
                <data-table
                    ref       = "vuetable"
                    :url      = "dataTableUrl"
                    :per-page = "perPage"
                    :columns  = "columns"
                    >
                   
                </data-table>
            </div>
        </div>
        <div class="modal fade" id="parentModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateparent() : createparent()">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <input id="imageparent"  type="file" @change="selectparentFile" name="image"
                                        placeholder="Email"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
                                    <has-error :form="form" field="image"></has-error>
                                </div>
                                <input id="parentname" v-model="form.name" type="text" name="name"
                                    placeholder="Name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                                <span id="parent_name" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="email" v-model="form.email" type="text" name="email"
                                    placeholder="Email"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                                <span id="parent_email" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="form.password" type="password" name="password" id="password"
                                placeholder="Password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                                <span id="parent_password" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="contact" v-model="form.contact" type="text" name="contact"
                                    placeholder="Contact"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('contact') }">
                                <has-error :form="form" field="contact"></has-error>
                                <span id="parent_contact" class="errors_message"></span>
                            </div>

                           

                            
                            <div class="form-group">
                                <input v-model="form.nicNumber" type="text" name="nicNumber" id="nicNumber"
                                placeholder="NIC Number"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('nicNumber') }">
                                <has-error :form="form" field="nicNumber"></has-error>
                                <span id="parent_nicNumber" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="form.qualification" type="text" name="qualification" id="qualification"
                                placeholder="Qualification"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('qualification') }">
                                <has-error :form="form" field="qualification"></has-error>
                                <span id="parent_qualification" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="form.occupation" type="text" name="occupation" id="occupation"
                                placeholder="Occupation"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('occupation') }">
                                <has-error :form="form" field="occupation"></has-error>
                                <span id="parent_occupation" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.homeAddress" name="homeAddress" id="homeAddress"
                                placeholder="Home Address "
                                class="form-control" :class="{ 'is-invalid': form.errors.has('address') }"></textarea>
                                
                                <span id="parent_homeAddress" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.officeAddress" name="officeAddress" id="officeAddress"
                                placeholder="Office Address (Optional)"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('officeAddress') }"></textarea>
                                
                                <span id="parent_officeAddress" class="errors_message"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>                                               
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="parentChildAddModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" > {{child_model_heading}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmodechild ? updatechild() : createchild()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="imagechild"  type="file" @change="selectFile" name="image"
                                    placeholder="Email"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
                                <has-error :form="form" field="image"></has-error>
                                <span id="child_image" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="childname" v-model="childform.name" type="text" name="name"
                                    placeholder="Name"
                                    class="form-control" :class="{ 'is-invalid': childform.errors.has('name') }">
                                <has-error :form="childform" field="name"></has-error>
                                <span id="child_name" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="rollno" v-model="childform.rollno" type="text" name="rollno"
                                    placeholder="Roll Number"
                                    class="form-control" :class="{ 'is-invalid': childform.errors.has('rollno') }">
                                <has-error :form="childform" field="rollno"></has-error>
                                <span id="child_rollno" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="childform.class" type="text" name="class" id="class"
                                placeholder="Class"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('class') }">
                                <has-error :form="form" field="class"></has-error>
                                <span id="child_class" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input id="age" v-model="childform.age" type="text" name="age"
                                    placeholder="Age"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('age') }">
                                <has-error :form="form" field="age"></has-error>
                                <span id="child_age" class="errors_message"></span>
                            </div>

                           

                            
                            <div class="form-group">
                                <input v-model="childform.school" type="text" name="school" id="school"
                                placeholder="School Name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('school') }">
                                <has-error :form="form" field="school"></has-error>
                                <span id="child_school" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="childform.section" type="text" name="section" id="section"
                                placeholder="Section"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('section') }">
                                <has-error :form="form" field="section"></has-error>
                                <span id="child_section" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="childform.branch" type="text" name="branch" id="branch"
                                placeholder="School Branch"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('branch') }">
                                <has-error :form="form" field="branch"></has-error>
                                <span id="child_branch" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="childform.nic" type="text" name="nic" id="nic"
                                placeholder="CNIC OR B-FORM"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('nic') }">
                                <has-error :form="form" field="nic"></has-error>
                                <span id="child_nic" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="childform.date_of_bith" type="date" name="date_of_bith" id="date_of_bith"
                                placeholder="Date Of Birth"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('date_of_bith') }">
                                <has-error :form="form" field="date_of_bith"></has-error>
                                <span id="child_date_of_bith" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <input v-model="childform.special_handling" type="text" name="special_handling" id="special_handling"
                                placeholder="Special Handling"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('special_handling') }">
                                <has-error :form="form" field="special_handling"></has-error>
                                <span id="child_special_handling" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <select @change = "list_bus_stations($event)" name="bus_id" v-model="childform.bus_id" id="bus_id" class="form-control" :class="{ 'is-invalid': form.errors.has('bus_id') }">
                                    <option value="">Select Bus</option>
                                    <option v-for="bus in driver_buses" :key = "bus.id" :value="bus.id">{{bus.bus_no}}</option>
                                    
                                </select>
                                <has-error :form="form" field="bus_id"></has-error>
                                <span id="child_bus_id" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <select name="bus_station" v-model="childform.bus_station" id="bus_station" class="form-control" :class="{ 'is-invalid': form.errors.has('bus_station') }">
                                    <option value="">Select Station</option>
                                    <option v-for="station in bus_stations" :key = "station.id" :value="station.id">{{station.name}}</option>
                                    
                                </select>
                                <has-error :form="form" field="bus_station"></has-error>
                                <span id="child_bus_station" class="errors_message"></span>
                            </div>
                            <div class="form-group">
                                <textarea v-model="childform.present_address" name="present_address" id="present_address"
                                placeholder="Present Address "
                                class="form-control" :class="{ 'is-invalid': form.errors.has('present_address') }"></textarea>
                                <has-error :form="form" field="present_address"></has-error>
                            </div>
                            <div class="form-group">
                                <textarea v-model="childform.permanent_address" name="permanent_address" id="permanent_address"
                                placeholder="Permanent Address"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('permanent_address') }"></textarea>
                                <has-error :form="form" field="permanent_address"></has-error>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>                                               
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="parentchildModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" >
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" >Child Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div v-if="parents_childs != ''">
                        <div class="row">
                            <div class="col-md-12 child_detail_box" v-for="childs in parents_childs" :key="childs.id">
                                <div 
                                     class="card" 
                                     style="width: 80%;">
                                  
                                  <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="card-title"><b>Name : </b>{{childs.name}}</h5><br>
                                            <p class="card-text">
                                                <b>Roll No : </b>{{childs.rollno}} <br><br>
                                                <b>Class : </b>{{childs.class}}
                                            </p>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="card-title"><b>School : </b>{{childs.school}}</h5><br>
                                            <p class="card-text">
                                                <b>Branch : </b>{{childs.branch}} <br><br>
                                                <b>Section : </b>{{childs.section}}
                                            </p>
                                           
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="card-title"><b>Age : </b>{{childs.age}}</h5><br>
                                            <p class="card-text">
                                                <b>DateOfBirth : </b>{{childs.date_of_bith}} <br><br>
                                                
                                            </p>
                                            <div class="row">
                                                <div class="col-md-8">                                             
                                                    <button  @click ="select_bus(childs.id)" :data-child_id = "childs.id"  class="btn btn-primary">Assign Bus</button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button  @click ="edit_child(childs)" :data-child_id = "childs.id"  class="btn btn-success">Edit</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                  </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div v-else class="no_child_style">
                        <p >No Data Available  </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="assign_bus_to_student" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" >Bus Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="scroll_div">
                        <div class="row" v-if="busess != ''"> 
                            <div class=" col-lg-4 col-md-6 col-sm-6 col-xs-12 " >
                                <div class="tile">
                                    <div class="wrapper">
                                        <div class="header">{{busess.bus_no}}-{{busess.bus_model}}</div>

                                        <div class="banner-img">
                                            <img :src="base_url+'/public/img/final_bus.gif'" alt="Image 1">
                                        </div>

                                        <div class="dates">
                                            <div class="start">
                                                <strong>STARTS</strong> {{busess.start_date}} <br> {{busess.start_year}}
                                                <span></span>
                                            </div>
                                            <div class="ends">
                                                <strong>ENDS</strong> {{busess.end_date}} <br>  {{busess.end_year}}
                                            </div>
                                        </div>

                                        <div class="stats">

                                            <div>
                                                <strong>CAPACITY</strong> {{busess.capacity}} 
                                            </div>

                                            <div>
                                                <strong>DRIVER</strong> {{busess.driver_name}} 
                                            </div>

                                            <div>
                                                <strong>BOOKED</strong> {{busess.book_seats}} 
                                            </div>

                                        </div>


                                        <div class="footer">
                                            <a @click="select_seat(busess)"  class="Cbtn Cbtn-primary">Seat Reservation</a>
                                            
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                            <div v-if="center != '' " class=" col-lg-8 col-md-6 col-sm-6 col-xs-12 " >
                                <GmapMap
                                :center="center"
                                :zoom="10"
                                map-type-id="terrain"
                                style="width: 500px; height: 439px"
                                >
                                    <gmap-info-window :options="infoOptions" :position="infoPosition" :opened="infoOpened" @closeclick="infoOpened=false">
                                        {{infoContent}}
                                    </gmap-info-window>
                                    <GmapMarker
                                        
                                        v-for="(m, key) in markers" :key="key"
                                        :position="getPosition(m.position)" 
                                        
                                        :clickable="true"
                                        :draggable="false"
                                        @click="toggleInfo(m, key)"
                                    />
                                </GmapMap>
                            </div>
                            
                                <!-- <gmap-autocomplete @place_changed="updatePlace"></gmap-autocomplete> -->
                            
                            <!-- <div class="col-md-4" v-if="busess != ''">
                                <a @click="select_seat(busess)">
                                    <div class="bus_division">
                                        <h5>Bus : </h5> <span>{{busess.bus_no}}-{{busess.bus_model}}</span><br>
                                        <h5>Driver : </h5> <span>{{busess.driver_name}}</span>
                                    </div>
                                </a>
                            </div>
                            <div v-else  style="margin-left: 13%">
                                <h2>No Bus Assign To this student</h2>    
                            </div>  -->
                            
                        </div>
                        <div v-else  style="margin-left: 13%">
                                <h2>No Bus Assign To this student</h2>    
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="select_seat_of_bus" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" style="z-index: 10000;">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: black" >Select Seat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmodeseat ? saveSeat() : saveSeat()">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="plane">
                                    <li class="row_custom row--9">
                                        <div   v-bind ="resetcounter()" >
                                            <div  v-bind ="resetcounter()" v-if="bus_data.bus_column == 3">
                                                <ol  v-for="index in 10" :key="index"  class="seats" type="A">
                                                    <li v-bind ="counter()" v-for="clm in bus_columns" :key="clm" class="seat" >
                                                        <span v-if="childs_ids.includes(index + clm)">
                                                        <span v-if="pos <= bus_data.capacity " >
                                                            <input checked = "checked" @click="check_checkbox($event)" name="seatNo"  type="checkbox" :id="index + clm" :value="index + clm"/>
                                                            <label :for="index + clm">{{index + clm}}</label>
                                                        </span>
                                                        </span>
                                                        <span v-else>
                                                        <span v-if="pos <= bus_data.capacity " >
                                                            <input :disabled = "bus_book_seats.includes(index + clm)" @click="check_checkbox($event)" name="seatNo"  type="checkbox" :id="index + clm" :value="index + clm"/>
                                                            <label :for="index + clm">{{index + clm}}</label>
                                                        </span>
                                                        </span>
                                                    </li>
                                                </ol>
                                            </div> 
                                        </div>
                                        <div   v-bind ="resetcounter()" >
                                           
                                            <div   v-bind ="resetcounter()" v-if="bus_data.bus_column == 2">
                                                <ol  v-for="index in 10" :key="index"  class="seats" type="A">
                                                    <li v-bind ="counter()" v-for="clm in bus_columns2" :key="clm" class="seat" :style="[clm == 'C' ? {'margin-right' : '0.285714%','margin-left' : '75%'} :{}] ">
                                                        <span v-if="childs_ids.includes(index + clm)">
                                                        <span v-if="pos <= bus_data.capacity " >
                                                            <input checked = "checked" @click="check_checkbox($event)" name="seatNo"  type="checkbox" :id="index + clm" :value="index + clm"/>
                                                            <label :for="index + clm">{{index + clm}}</label>
                                                        </span>
                                                        </span>
                                                        <span v-else>
                                                        <span v-if="pos <= bus_data.capacity " >
                                                            <input :disabled = "bus_book_seats.includes(index + clm)" @click="check_checkbox($event)" name="seatNo"  type="checkbox" :id="index + clm" :value="index + clm"/>
                                                            <label :for="index + clm">{{index + clm}}</label>
                                                        </span>
                                                        </span>
                                                    </li>
                                                </ol> 
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>                                               
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    window.Vue = require('vue');
    import VueRouter from 'vue-router';
    import router from './../routes';
    Vue.use(VueRouter);
    import ExampleButton from './ExampleButton.vue';
    import threeSeatComponent from './threeSeatComponent.vue';
    import twoSeatComponent from './twoSeatComponent.vue';
    export default {
        data() {
            return {
                child_model_heading : '',
                base_url      : base_url,
                pos           : 0,
                childfile     : {},
                parentfile    : {},
                parents_childs: {},
                parent_errors : {},
                child_errors  : {},
                childs_ids    : [],
                child_id      : 0,
                parent_id     : 0,
                busess        : {},
                driver_buses  : {},
                bus_stations  : {},
                bus_data      : {},
                bus_book_seats: [],
                bus_columns   : ['A','B','C','D','E','F'],
                bus_columns2   : ['A','B','C','D'],
                editmode      : true,
                editmodeseat  : false,
                editmodechild : false,
                model_heading : 'Add Model',
                perPage       : ['3', '25', '50'],
                dataTableUrl  : api_url +"/get_parents_data",
                markers: '',
                infoPosition: null,
                infoContent: null,
                infoOpened: false,
                infoCurrentKey: null,
                infoOptions: {
                    pixelOffset: {
                        width: 0,
                        height: -35
                    }
                },
                center : '',
                columns: [
                    {
                        label: 'Name',
                        name: 'name',
                        filterable: true,
                    },
                    {
                        label: 'Email',
                        name: 'email',
                        filterable: true,
                    },
                    {
                        label: 'NIC Number',
                        name: 'nicNumber',
                        filterable: true,
                    },
                    {
                        label: 'Total Childs',
                        name: 'total_childs',
                        filterable: true,
                    },
                    {
                        label: '',
                        name: 'View Child Detail',
                        filterable: false,
                        component: ExampleButton,
                        click: this.editModal,
                        classes: { 
                            'btn': true,
                            'btn-primary': true,
                            'btn-sm': true,
                        }
                    },
                ],
                form: new form({
                    id            :'',
                    name          : '',
                    password      : '',
                    email         : '',
                    contact       : '',
                    nicNumber     :  '',
                    qualification : '',
                    occupation    : '',
                    homeAddress   : '',
                    officeAddress : '', 
                }),
                Seatform: new form({
                    relationid : '',
                    seatNo     : '',
                    parentid   : '',
                    childid    : '',
                    busid      : '',
                }) ,
                childform: new form({
                    id                : '',
                    name              : '',
                    rollno            : '',
                    class             : '',
                    parent_id         : '',
                    age               : '',
                    school            : '',
                    section           : '',
                    branch            : '',
                    date_of_bith      : '',
                    nic               : '',
                    present_address   : '',
                    permanent_address : '',
                    special_handling  : '',
                    bus_station       : '',
                    bus_id            : '',
                    rel_id            : '',
                })
                
            }
        },
        mounted() {
            // console.log('Component mounted.');
            console.log(this.$route.params.length)
            if (this.$route.params){
                console.log(this.$route.params);
            }
            
           

        },
        components: {
        // eslint-disable-next-line
            ExampleButton,
            threeSeatComponent,
            twoSeatComponent
        },
       
        methods: {
            selectFile (e) {
                const file      = e.target.files[0];
                this.childfile  = file;
            } ,
            selectparentFile (e) {
                const file      = e.target.files[0];
                this.parentfile  = file;
            } ,
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
            
            getPosition: function(marker) {
                return {
                    lat: parseFloat(marker.lat),
                    lng: parseFloat(marker.lng)
                }
            },
            toggleInfo: function(marker, key) {
             
                console.log(marker);
                this.infoPosition = this.getPosition(marker.position)
                this.infoContent = marker.name
                if (this.infoCurrentKey == key) {
                    this.infoOpened = !this.infoOpened
                } else {
                    this.infoOpened = true
                    this.infoCurrentKey = key
                }
            },
            check_checkbox(event){
             
                let value = event.srcElement.defaultValue;
                let group = "input:checkbox[name='seatNo']";
                if (event.srcElement.checked == true) {
                    $(group).prop("checked", false);
                    $(event.srcElement).prop("checked", true);
                }
                this.Seatform.seatNo    = value;
                console.log(value);
            },
             resetcounter(){
                this.pos = 0;
            },
             counter (){
                this.pos = this.pos +1;
                // console.log(this.pos);
            },
            select_seat(bus){
                // this.seatPosition     = 0;
                let _this                = this;
                this.bus_data            = bus;
                this.Seatform.childid    = this.child_id;
                this.Seatform.parentid   = this.parent_id;
                this.Seatform.relationid = bus.id;
                this.Seatform.busid      = bus.bus_id;
                axios({
                    method: 'post',
                    url: api_url +'/get_bus_seat',
                    data: {
                        'busid' : bus.bus_id,
                        'relid' : bus.id
                    },
                })
                .then(function (response) {
                    // console.log(response);
                    _this.bus_book_seats = [];
                    let ids  = [];
                    _this.childs_ids = [];
                    $.each(response.data.res, function(key, value) {
                        // console.log(value);
                        _this.bus_book_seats.push(value.seatNo);
                        if(value.child_id == _this.child_id){
                            _this.childs_ids.push(value.seatNo);
                        }
                        
                    });


                    
                })
                .catch(function (response) {
                    
                });
                
                // console.log(this.bus_book_seats);
                $("#select_seat_of_bus").modal('show');
                // this.seatPosition        = 0;
            },
            alertMe(data) {
                console.log(data.id);
            },
            select_bus(child_id){
                
                this.child_id = child_id;
                let _this     = this;
                axios({
                    method: 'get',
                    url: api_url +'/get_all_busess_routes/'+child_id,
                })
                .then(function (response) {
                    _this.busess = {};
                    
                    _this.busess = response.data;
                    _this.markers = response.data.bus_station;
                    if(_this.markers != ''){
                        _this.center = _this.markers[0].position;
                    }
                    console.log(_this.markers);
                    
                })
                .catch(function (response) {
                });
                $("#assign_bus_to_student").modal("show");
            },
            updateCenter(location) {
                console.log(location.lat());
            this.mapCenter = {
              lat: location.lat(),
              lng: location.lng(),
            }
            },
            updatePlace(place) {
                console.log(place);                              
                this.updateCenter(place.geometry.location);
            },
            editModal(data,button_click){
                if (button_click == 'edit_parent') {
                    this.model_heading = 'Edit Model';
                    $(".errors_message").html('');
                    this.editmode      = true;
                    this.form.reset();
                    
                    console.log(this.form);
                    $('#parentModal').modal('show');
                    this.form.fill(data); 
                    this.form.password = '';
                }
                else if(button_click == 'view_child'){
                    this.parent_id = data.id;
                    console.log(data.id);
                    let childs  = data.childs;
                    this.parents_childs = {};
                    this.parents_childs = childs;
                    $('#parentchildModal').modal('show');
                    console.log('here child script');
                }
                else if(button_click == 'add_child'){
                    this.parent_id = data.id;
                    console.log(data.id);
                    this.add_child(data);
                }

                
            },
            add_child(){
                $(".errors_message").html('');
                this.child_model_heading = 'Add Chid Model';
                let _this = this;
                this.childform.bus_id  = '';
                this.bus_stations      = {};
                this.driver_buses      = {};
                this.childform.parent_id = this.parent_id;
                axios({
                    method: 'get',
                    url: api_url +'/get_busess_for_childs',
                })
                .then(function (response) {
                    console.log(response.data);
                    _this.driver_buses = response.data;
                })
                .catch(function (response) {
                    //handle error
                    console.log(response);
                });
                this.childform.reset();
                $('#parentChildAddModal').modal('show');
            },
            list_bus_stations(event){
                let selected_value = event.target.value;
                var index          = this.driver_buses.findIndex(item => item.id == selected_value);
                this.bus_stations  = this.driver_buses[index].bus_station
                this.childform.rel_id = this.driver_buses[index].rel_id;
                console.log(this.driver_buses[index].rel_id);
            },
            createchild(){
                let page_number = this.getPageNumber();
                this.childform.parent_id = this.parent_id;
                let data = new FormData();
                data.set('image', this.childfile);
                data.set('name', this.childform.name);
                data.set('rollno', this.childform.rollno);
                data.set('class', this.childform.class);
                data.set('parent_id', this.childform.parent_id);
                data.set('age', this.childform.age);
                data.set('school', this.childform.school);
                data.set('section', this.childform.section);
                data.set('branch', this.childform.branch);
                data.set('date_of_bith', this.childform.date_of_bith);
                data.set('nic', this.childform.nic);
                data.set('present_address', this.childform.present_address);
                data.set('permanent_address', this.childform.permanent_address);
                data.set('special_handling', this.childform.special_handling);
                data.set('bus_station', this.childform.bus_station);
                data.set('bus_id', this.childform.bus_id);
                data.set('rel_id', this.childform.rel_id);
                axios.post(api_url +'/update_child_data', data)
                .then(response => {
                    $('#parentModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.vuetable.getData();
                    $('#parentChildAddModal').modal('hide');
                    this.$refs.vuetable.getData(this.$refs.vuetable.checkUrlForPagination(page_number));
                    this.form.reset();
                }) 
                .catch(error => {
                    this.child_errors =  error.response.data.errors;
                    $(".errors_message").html('');
                    $.each(this.child_errors, function(key, value) {
                        $("#child_"+key).html('');
                        $("#child_"+key).html(value);
                    });
                    this.$Progress.finish();
                });
                //  this.childform.post(api_url +'/update_child_data')
                // .then(({ data }) =>{
                //     $('#parentModal').modal('hide');
                //     toast.fire({
                //         type: 'success',
                //         title: 'Update successfully'
                //     })
                //     this.$Progress.finish();
                //     // console.log(this.$refs.vuetable);
                //     this.$refs.vuetable.getData();
                //     $('#parentChildAddModal').modal('hide');
                // })
                // .catch(() => {

                // })
                
            },
            newModal(){
                this.model_heading = 'Add Model';
                this.editmode      = false;
                this.form.reset();
                $(".errors_message").html('');
                $('#parentModal').modal('show');
            },
            updateparent(){
                this.$Progress.start();
                let page_number = this.getPageNumber();
                let data = new FormData();
                data.set('image', this.parentfile);
                data.set('id', this.form.id);
                data.set('name', this.form.name);
                data.set('password', this.form.password);
                data.set('email', this.form.email);
                data.set('contact', this.form.contact);
                data.set('nicNumber', this.form.nicNumber);
                data.set('qualification', this.form.qualification);
                data.set('occupation', this.form.occupation);
                data.set('homeAddress', this.form.homeAddress);
                data.set('officeAddress', this.form.officeAddress);
                axios.post(api_url +'/update_parent_data', data)
                .then(response => {
                   $('#parentModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.vuetable.getData(this.$refs.vuetable.checkUrlForPagination(page_number));
                }) 
                .catch(error => {
                    this.parent_errors =  error.response.data.errors;
                    $(".errors_message").html('');
                    $.each(this.parent_errors, function(key, value) {
                        $("#parent_"+key).html('');
                        $("#parent_"+key).html(value);
                    });
                    this.$Progress.finish();
                });
                // this.form.post(api_url +'/update_parent_data')
                // .then(({ data }) =>{
                //     $('#parentModal').modal('hide');
                //     toast.fire({
                //         type: 'success',
                //         title: 'Update successfully'
                //     })
                //     this.$Progress.finish();
                //     // console.log(this.$refs.vuetable);
                //     this.$refs.vuetable.getData(this.$refs.vuetable.checkUrlForPagination(page_number));
                // })
                // .catch(() => {

                // })

            },
            edit_child(data){
                this.editmodechild = true;
                let _this = this;
                $(".errors_message").html('');
                this.child_model_heading = 'Edit Chid Model';
                this.childform.reset();
                axios({
                    method: 'get',
                    url: api_url +'/get_busess_for_childs_edit/'+data.bus_id,
                })
                .then(function (response) {
                    // console.log(response.data);
                    _this.driver_buses     = response.data;
                    var index              = _this.driver_buses.findIndex(item => item.id == data.bus_id);
                    _this.bus_stations     = _this.driver_buses[index].bus_station
                    
                    console.log(_this.childform.rel_id);
                    $('#parentChildAddModal').modal('show');
                    _this.childform.fill(data); 
                    _this.childform.rel_id = _this.driver_buses[index].rel_id;
                })
                .catch(function (response) {
                    //handle error
                    console.log(response);
                });
                
                
            },
            updatechild(){
               let page_number = this.getPageNumber();
                let data = new FormData();
                data.set('image', this.childfile);
                data.set('id', this.childform.id);
                data.set('name', this.childform.name);
                data.set('rollno', this.childform.rollno);
                data.set('class', this.childform.class);
                data.set('parent_id', this.childform.parent_id);
                data.set('age', this.childform.age);
                data.set('school', this.childform.school);
                data.set('section', this.childform.section);
                data.set('branch', this.childform.branch);
                data.set('date_of_bith', this.childform.date_of_bith);
                data.set('nic', this.childform.nic);
                data.set('present_address', this.childform.present_address);
                data.set('permanent_address', this.childform.permanent_address);
                data.set('special_handling', this.childform.special_handling);
                data.set('bus_station', this.childform.bus_station);
                data.set('bus_id', this.childform.bus_id);
                data.set('rel_id', this.childform.rel_id);
                axios.post(api_url +'/update_child_data', data)
                .then(response => {
                    $('#parentModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    
                    $('#parentChildAddModal').modal('hide');
                    this.$refs.vuetable.getData(this.$refs.vuetable.checkUrlForPagination(page_number));
                    this.form.reset();
                }) 
                .catch(error => {
                    this.child_errors =  error.response.data.errors;
                    $(".errors_message").html('');
                    $.each(this.child_errors, function(key, value) {
                        $("#child_"+key).html('');
                        $("#child_"+key).html(value);
                    });
                    this.$Progress.finish();
                });

            },

            
            createparent(){
                let page_number = this.getPageNumber();
                let data = new FormData();
                data.set('image', this.parentfile);
                data.set('name', this.form.name);
                data.set('password', this.form.password);
                data.set('email', this.form.email);
                data.set('contact', this.form.contact);
                data.set('nicNumber', this.form.nicNumber);
                data.set('qualification', this.form.qualification);
                data.set('occupation', this.form.occupation);
                data.set('homeAddress', this.form.homeAddress);
                data.set('officeAddress', this.form.officeAddress);
                axios.post(api_url +'/update_parent_data', data)
                .then(response => {
                    
                   $('#parentModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    // console.log(this.$refs.vuetable);
                    this.$refs.vuetable.getData();
                }) 
                .catch(error => {
                    this.parent_errors =  error.response.data.errors;
                    $(".errors_message").html('');
                    $.each(this.parent_errors, function(key, value) {
                        
                        $("#parent_"+key).html(value);
                    });
                    this.$Progress.finish();
                    
                });
                // this.form.post(api_url +'/update_parent_data')
                // .then(({ data }) =>{
                //     $('#parentModal').modal('hide');
                //     toast.fire({
                //         type: 'success',
                //         title: 'Update successfully'
                //     })
                //     this.$Progress.finish();
                //     // console.log(this.$refs.vuetable);
                //     this.$refs.vuetable.getData();
                // })
                // .catch(() => {

                // })
            },
            saveSeat(){
                let page_number = this.getPageNumber();
                this.Seatform.post(api_url +'/save_seat')
                .then(({ data }) =>{
                    $('#parentModal').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })
                    this.$Progress.finish();
                    $("#select_seat_of_bus").modal('hide');
                    $("#assign_bus_to_student").modal("hide");
                    // console.log(this.$refs.vuetable);
                    this.$refs.vuetable.getData(this.$refs.vuetable.checkUrlForPagination(page_number));
                })
                .catch(() => {

                })
            },
            
            getPageNumber(){
                var text_page   = 
                                  $(".page-item.active").text();
                
                if (text_page == '') {
                    page_number = 1;
                }
                else{
                    text_page       = text_page .split(' ');
                    var page_number = text_page[16];
                    page_number     = parseInt(page_number);
                }
                return page_number;
            },
            
            check(){
                var text_page = $(".page-item.active").text();
                text_page   = text_page .split(' ');
                var page_number = text_page[16];
                page_number     = parseInt(page_number);
                alert(page_number);
            }
        },
        props: {
            data: {},
            notyId : ''
        },
        created() {
            // this.onLoad();
            this.check_session();
            
            // alert(this.id);
            
        },
        computed :{
            normalizedList () {
                return this.bus_columns.map((element) => {
                    this.seatPosition+=1;
                    console.log(element);
                })
            }
        }

    }
</script>
