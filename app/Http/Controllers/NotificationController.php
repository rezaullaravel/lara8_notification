<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //show notification
    public function showNotification(){

        return view('admin.notification.show_notification');
    }//end method


    //mark as read
    public function markAsRead($id){
        auth()->user()->notifications->where('id',$id)->markAsRead();
        return redirect()->back();
    }//end method
}
