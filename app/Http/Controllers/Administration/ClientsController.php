<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientsController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return view('administration.clients.index')
            ->with('clients', $clients);
    }

    public function create()
    {
        return view('administration.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:clients,email,NULL,id,deleted_at,NULL',
            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'full_address'=>'required',
            'nid'=>'required',
            'nid_type'=>'required',
            'birthdate'=>'required',
            'ocupation'=>'required',
          ]);

        $client = Client::create($request->all());

        $client->addMediaFromRequest("photo")->toMediaCollection('photo');

        flash(__('messages.entity_created', ['name' => __('messages.client')]))->success()->important();
        return redirect()->route('administration.clients.index');
    }

    public function edit($id)
    {
        $client = Client::find($id);

        if($client === null) {
            return abort(404);
        }

        return view('administration.clients.edit')
            ->with('client', $client);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        if($client === null) {
            return abort(404);
        }

        $request->validate([
            'email'=>'required|unique:clients,email,'.$id.',id,deleted_at,NULL',
            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'full_address'=>'required',
            'nid'=>'required',
            'nid_type'=>'required',
            'birthdate'=>'required',
            'ocupation'=>'required',
        ]);

        $client->update($request->all());
        
        if ($request->hasFile('photo')) {
            if(!$client->getMedia('photo')->isEmpty()) {
                $client->getFirstMedia('photo')->delete();  
            }
            $client->addMediaFromRequest("photo")->toMediaCollection('photo');
        }


        flash(__('messages.entity_updated', ['name' => __('messages.client')]))->success()->important();
        return redirect()->route('administration.clients.index');
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        flash(__('messages.entity_deleted', ['name' => __('messages.client')]))->error()->important();
        return redirect()->route('administration.clients.index');
    }
}
