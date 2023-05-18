<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|unique:clients,company_name',
            'email' => 'required|unique:clients,email',
            'phone' => 'required',
            'company_address' => 'required',
            'company_city' => 'required',
            'company_zip' => 'required',
            'company_vat' => 'required',
            'status' => 'required'
        ]);

        Client::create($request->all());

        return redirect()->route('client.index');

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
        $client=Client::find($id);
        return view('admin.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_address' => 'required',
            'company_city' => 'required',
            'company_zip' => 'required',
            'company_vat' => 'required',
            'status' => 'required'
        ]);

        $client=Client::find($id);
        $client->update($request->all());
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client=Client::find($id);
        $client->delete();
        return redirect()->route('client.index');
    }
}
