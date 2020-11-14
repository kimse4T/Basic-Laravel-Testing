<?php

namespace App\Repositories;

use App\Models\Account;
use App\Models\Contact;

class AccountRepository
{

    public function create($request)
    {
        $name = $request->account_name;
        $account = new Account;

        $account->name = $name;
        $account->phone = '+'.rand(100000000, 999999999);
        $account->email = \Str::random(5).'@email.com';
        $account->address = 'Phnom Penh';
        $account->save();

        return $account->id;
    }

    public function update($request)
    {
        $name = $request->account_name;

        $account = Account::find(Contact::find($request->id)->account_id);

        $account->name = $name;
        $account->save();
    }
}
