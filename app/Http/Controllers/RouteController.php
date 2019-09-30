<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RouteModel;
use App\tblStation;

use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class RouteController extends Controller
{
    public function __construct(){

	}
    public function get_data(Request $request){

		$columns     = ['id','location'];
		$column      = $request['column'];
		$dir         = $request['dir'];
		$length      = $request['length'];
		$searchValue = $request['search'];
		$query = RouteModel::select('*')
		->orderBy('route_models.id','DESC');
		if ($searchValue) {
			$query->where(function($query) use ($searchValue) {
			$query->where('location', 'like', '%' . $searchValue . '%')
			->orWhere('id', 'like', '%' . $searchValue . '%');
			});
		}
        $data        = $query->paginate($length);
        foreach ($data as $key => $value) {
			// $data[$key]['total_drivers'] = DriverBusRelation::where('bus_id', $value['id'])->count();
		}
		return new DataTableCollectionResource($data);
    }
    
    public function update_route_data(Request $request){

		if ($request->id == '') {
			$this->validate($request,[
                'location'     => 'required|string',
	        ]);
	        $route            = new RouteModel;
			$route->location  = $request->location;
			$route->save();
			$LastInsertId = $route->id;
			$count = 0 ;
			foreach ($request->station as $key => $value) {
				echo $value['station']."<br>";
				
				if (!empty($value['station'])) {
					$count ++;
					$stations            = new tblStation;
					$stations->name      = $value['station'];
					$stations->route_id  = $LastInsertId;
					$stations->order     = $count;
					$stations->save();
				}
				else{

				}
			}
		}
		else{
			$id  = $request->id;
            $route = RouteModel::findOrFail($id);
            $this->validate($request,[
                'location'     => 'required|string',
	        ]);
			$route->location  = $request->location;
			$route->save();
		}
		
    }
    public function delete_route(Request $request){

		$id  = $request->id;
		$res = RouteModel::where('id',$id)->delete();
		return $res;
    }
    
}
