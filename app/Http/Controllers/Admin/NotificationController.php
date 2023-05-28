<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
   

    public function update(Request $request, DatabaseNotification $notification){
        $notification->markAsRead();

        return redirect()->route('crm.home');
    }


    public function destroy(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->route('crm.home');


    }
}
