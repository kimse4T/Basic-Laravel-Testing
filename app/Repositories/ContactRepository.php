<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{

    public function create($request)
    {
        $contact = new Contact;

        $contact->first_name = $request['first_name'];
        $contact->last_name = $request['last_name'];
        $contact->phone = $request['phone'];
        $contact->address = $request['address'];
        $contact->account_id = $request['account_id'];

        $contact->save();
    }

    public function update($request)
    {
        $contact = $request->toArray();

        $updateContact = Contact::find($contact['id']);

        $updateContact->first_name = $contact['first_name'];
        $updateContact->last_name = $contact['last_name'];
        $updateContact->phone = $contact['phone'];
        $updateContact->address = $contact['address'];

        $updateContact->save();
    }
}

