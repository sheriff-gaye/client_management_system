<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Notifications\DatabaseNotification;

class DasboardController extends Controller
{
    public function index() {
        $clients=Client::all()->count();
        $tasks=Task::all()->count();
        $users=User::all();
        $projects=Project::all()->count();
        $notifications = auth()->user()->unreadNotifications;


        return view('admin.index',compact('clients','users','projects','tasks','notifications'));
    }

   
}
