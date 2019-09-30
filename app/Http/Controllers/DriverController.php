<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Busses;
use App\RouteModel;
use App\DriverBusRelation;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
class DriverController extends Controller
{
    public function __construct()
	{

	} 

	public function get_data(Request $request){
		$columns     = ['id','name', 'email'];
		$column      = $request['column'];
		$dir         = $request['dir'];
		$length      = $request['length'];
		$searchValue = $request['search'];
		$query = Driver::select('*')
		->orderBy('drivers.id','DESC');
		if ($searchValue) {
			$query->where(function($query) use ($searchValue) {
			$query->where('name', 'like', '%' . $searchValue . '%')
			->orWhere('email', 'like', '%' . $searchValue . '%')
			->orWhere('id', 'like', '%' . $searchValue . '%');
			});
		}
		$data        = $query->paginate($length);
		return new DataTableCollectionResource($data);
	}
	public function update_driver_data(Request $request){
		if ($request->id == '') {
			$this->validate($request,[
	            'name'         => 'required|string|max:191',
				'email'        => 'required|string|email|max:191|unique:drivers',
				'phonenumber'  => 'required|max:191',
	            'idcardnumber' => 'required|string|max:191|unique:drivers'
	        ]);
	        $parent               = new Driver;
			$parent->name         = $request->name;
			$parent->email        = $request->email;
			$parent->phonenumber  = $request->phonenumber;
			$parent->idcardnumber = $request->idcardnumber;
			$parent->address      = $request->address;
			$parent->save();
		}
		else{
			$id     = $request->id;
			$driver = Driver::findOrFail($id);
        	$this->validate($request,[
				'name'         => 'required|string|max:191',
				'email'        => 'required|string|email|max:191|unique:drivers,email,'.$id,
				'phonenumber'  => 'required|max:191',
				'idcardnumber' => 'required|string|max:191|unique:drivers,idcardnumber,'.$id
			]);
			$driver->name         = $request->name;
			$driver->email        = $request->email;
			$driver->phonenumber  = $request->phonenumber;
			$driver->idcardnumber = $request->idcardnumber;
			$driver->address      = $request->address;
			$driver->save();
	        return ['message' => 'Updated the Driver info'];
		}
		
	}
	public function delete_driver(Request $request)
	{
		$id  = $request->id;
		$res = Driver::where('id',$id)->delete();
		return $res;
	}
	public function assign_bus(Request $request){
        
        $driver_id      = $request->id;
		$data['busses'] = Busses::all();
		$data['routes'] = RouteModel::all();
		
		return $data;
	}
	public function assign_bus_to_drivers(Request $request){
		$messages = array( 'required' => 'This field is Required' );
		$this->validate($request,[
			'bus_id'    => 'required',
			'route_id'    => 'required',
			'starttime' => 'required',
			'endtime'   => 'required',
		],$messages);
		$res =  $this->check_date_avalilability($request->all());
		if($res > 0){
			$data['msg'] = 'Not_Available';
			echo json_encode($data);
		}
		else{
			$book_time                  = $request->starttime .','.$request->endtime;
			$bus_driver_rel             = new DriverBusRelation;
			$bus_driver_rel->driver_id  = $request->driver_id;
			$bus_driver_rel->bus_id     = $request->bus_id;
			$bus_driver_rel->route_id   = $request->route_id;
			$bus_driver_rel->book_time  = $book_time;
			$bus_driver_rel->save();
			$data['msg']  = 'saved';
			echo json_encode($data);
		}
	}
	public function check_date_avalilability($req){
		$id        = $req['bus_id'];
		$count     = 0;
		$startTime = strtotime($req['starttime']);
		$endTime   = strtotime($req['endtime']);
		$times     = DriverBusRelation::where('bus_id',$id)->get();
		foreach($times as $time){
			$point = $time->book_time;
			if ($point != '') {
				$point = explode(',' , $point);
				$startpoint = strtotime($point[0]);
				$endpoint   = strtotime($point[1]);
				if($this->testRange($startTime,$endTime,$startpoint,$endpoint)){
					
				}
				else{
					$count ++;
				}
			}
			else{

			}	
		}
		return $count;
		// echo $count;exit;
	}
	function testRange($start_time1,$end_time1,$start_time2,$end_time2){

		$timeCheck;

		if(($end_time1 < $start_time2))
		{
			$timeCheck = true;
			return $timeCheck;
		}
		else if(($start_time1 > $start_time2) && ($start_time1 > $end_time2)) 
		{
			$timeCheck = true;
			return $timeCheck;
		}
		else
		{
			$timeCheck = false;
			return $timeCheck;
		}

	}
}
