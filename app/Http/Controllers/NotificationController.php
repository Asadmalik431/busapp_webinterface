<?php

namespace App\Http\Controllers;
use App\Events\NotificationEvent;
use Illuminate\Http\Request;
use Event;
class NotificationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function get_notification(Request $request){
        // echo date('h:m:s a');
        // exit;
        // echo "dsfd";exit;
        $data = $request->all();
        // echo "<pre>";
        // print_r($data);
        // exit;
        $notificationdata  = Event::fire(new NotificationEvent($data));
        // $notificationdata  = event(new NotificationEvent($data));

        // echo "<pre>";
        // print_r($notificationdata);
        // exit;
        // return $data;
    }
}
