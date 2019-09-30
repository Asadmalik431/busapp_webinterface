<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // echo "ds";
        return view('home');
    }
    public function get_notification(Request $request){
        // echo "fkd";exit;
        $data = $request->all();
        
        // return $data;
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'            => 'required|string|email|max:191',
            'password'         => 'required',
        ]);
        $res                  = array();
        $count = User::where('email',$request->email)->count();
        if($count == 1){
            $res['err_email']     = 'no';
            $res['email_message'] = '';
            $data = User::where('email',$request->email)->first();
            if( Hash::check($request->password,$data->password)) {
                Session()->put('id', $data->id);
                Session()->put('email', $data->email);
                Session()->put('name', $data->name);
                Session()->put('type', $data->type);
                Session()->put('photo', $data->photo);
                $res['pass_message'] = '';
                $res['err_pass']     = 'no'; 
                $res['sess_id']      = session('id');
                $res['sess']         = Session()->all();
            }
            else{
                // echo "ff";exit;
                $res['err_pass']      = 'yes'; 
                $res['pass_message']  = 'Password you enter does not match';
            }
        }
        else{
            $res['err_pass']      = 'yes'; 
            $res['pass_message']  = '';
            $res['err_email']     = 'yes';
            $res['email_message'] = 'Email You Enter Does Not Exist';
        }
        // echo "<pre>";
        // print_r(Session()->all());
        // exit;
        // $request->session()->flush();
        return $res;
        // $request->session()->put('id', 'value');
        // print_r($request->session()->all());
        // $request->session()->flush();
    }
    function get_session(Request $request){
        
        if(session('id'))
        {
            $res['id']    = Session()->get('id');
            $res['email'] = Session()->get('email');
            $res['type']  = Session()->get('type');
            $res['photo'] = Session()->get('photo');
            $res['err']   = 'yes';
            return $res;
        }
        else{
            $res['err']   = 'no';
            return $res;
        }
    }
}
