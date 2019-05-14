<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipient;
use App\Client;

class RecipientsController extends Controller
{

    public function index()
    {
        $recipients = Recipient::paginate(5);
        return view('administration.recipients.index')
            ->with('recipients', $recipients);
    }

    public function create()
    {
        $clients = Client::all();
        return view('administration.recipients.create')
            ->with('clients', $clients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:recipients,email,NULL,id,deleted_at,NULL',
            'client_id'=>'required',
            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'full_address'=>'required',
            'nid'=>'required',
            'nid_type'=>'required',
            'bank_name'=>'required',
            'account_number'=>'required',
          ]);

        $recipient = Recipient::create($request->all());

        flash(__('messages.entity_created', ['name' => __('messages.recipient')]))->success()->important();
        return redirect()->route('administration.recipients.index');
    }

    public function edit($id)
    {
        $recipient = Recipient::find($id);

        if($recipient === null) {
            return abort(404);
        }

        $clients = Client::all();

        return view('administration.recipients.edit')
            ->with('recipient', $recipient)
            ->with('clients', $clients);
    }

    public function update(Request $request, $id)
    {
        $recipient = Recipient::find($id);

        if($recipient === null) {
            return abort(404);
        }

        $request->validate([
            'email'=>'required|unique:recipients,email,'.$id.',id,deleted_at,NULL',
            'client_id'=>'required',
            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'full_address'=>'required',
            'nid'=>'required',
            'nid_type'=>'required',
            'bank_name'=>'required',
            'account_number'=>'required',
          ]);

          $recipient->update($request->all());
        
        flash(__('messages.entity_updated', ['name' => __('messages.recipient')]))->success()->important();
        return redirect()->route('administration.recipients.index');
    }

    public function destroy($id)
    {
        $recipient = Recipient::find($id);
        $recipient->delete();

        flash(__('messages.entity_deleted', ['name' => __('messages.recipient')]))->error()->important();
        return redirect()->route('administration.recipients.index');
    }
}
