<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisteredVoters;
use Illuminate\Http\Request;

class RegisteredvotersController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except('create');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voters=RegisteredVoters::all();
        return view('admin.voters.index',compact('voters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.voters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name'=>'required',
            'username'=>'required||unique:registered_voters,username|max:6',
            'sex'=>'required',
            'email'=>'required|unique:registered_voters,email',
            'student_id'=>'required|unique:registered_voters,student_id|digits:7',
            'profile'=>'required',


        ]);

        $image=$request->file('profile');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);


        RegisteredVoters::create([
            'full_name'=>$request->get('full_name'),
            'username'=>$request->get('username'),
            'sex'=>$request->get('sex'),
            'email'=>$request->get('email'),
            'student_id'=>$request->get('student_id'),
            'profile'=>$name,
        ]);

        return redirect()->route('voters.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
