<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use App\ParentsTable;
use App\Children;
use APP\DriverBusRelation;
use DB;
class ParentsController extends Controller
{
    public function __construct()
	{

	}
	public function get_data(Request $request){
		
		$columns     = ['id','name'];
		$column      = $request['column'];
		$dir         = $request['dir'];
		$length      = $request['length'];
		$searchValue = $request['search'];
		$query = ParentsTable::select('parents_tables.id','parents_tables.name')
			->orderBy('parents_tables.id','DESC');
		if ($searchValue) {
			$query->where(function($query) use ($searchValue) {
			$query->where('name', 'like', '%' . $searchValue . '%')
			->orWhere('id', 'like', '%' . $searchValue . '%');
			})
			;
		}
		$data        = $query->paginate($length);
		foreach ($data as $key => $value) {
			$data[$key]['total_childs'] = Children::where('parent_id', $value['id'])->count();
			$data[$key]['childs'] = Children::where('parent_id', $value['id'])->get();
			
		}
		$data['bus_relation'] = DriverBusRelation::get();
		
		return new DataTableCollectionResource($data);
	}
	public function update_parent_data(Request $request){
		if ($request->id == '') {
			$this->validate($request,[
	            'name'     => 
	            			  'required|string|max:191|unique:parents_tables',
	            'password' => 'required|string|min:6'
	        ]);
	        $parent           = new ParentsTable;
			$parent->name     = $request->name;
			$parent->password = $request->password;
			$parent->save();
		}
		else{
			$id   = $request->id;
			$user = ParentsTable::findOrFail($id);
	        $this->validate($request,[
	            'name' => 'required|string|max:191|unique:parents_tables,name,'.$id,
	        ]);
	        $user->name = $request->name;
	        if (!empty($request->password)) {
	        	$user->password = $request->password;
	        }
	        $user->save();
	        return ['message' => 'Updated the user info'];
		}
		
	}

}
