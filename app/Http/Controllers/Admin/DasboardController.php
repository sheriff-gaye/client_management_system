<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Client;
use App\Models\Project;
use App\Models\RegisteredVoters;
use App\Models\User;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index() {
        $clients=Client::all()->count();
        $users=User::all()->count();
        $projects=Project::all()->count();
        return view('admin.index',compact('clients','users','projects'));
    }
}
