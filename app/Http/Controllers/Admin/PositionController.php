<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions=Position::all();
        return view('admin.position.index',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'position_name'=>'required|unique:positions,position_name',
            'status'=>'required',
        ]);

        Position::create([
            'position_name'=>$request->get('position_name'),
            'status'=>$request->get('status')
        ]);

        return redirect()->route('position.index');
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
        $position=Position::find($id);
        return view('admin.position.edit',compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'position_name'=>'required',
            'status'=>'required',
        ]);

        $position=Position::find($id);
        $position->update($request->all());

        return redirect()->route('position.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position=Position::find($id);
        $position->delete();
        return redirect()->route('position.index');


        
    }
}
