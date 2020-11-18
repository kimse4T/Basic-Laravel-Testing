<?php

namespace Tests\Feature\CrudTesting;

use App\Models\Account;
use Tests\TestCase;

class AccountCrudTest extends TestCase
{
    /** @test */
    public function listAllAccounts()
    {
    }

    /** @test */
    public function previewAccountDetail()
    {
    }

    /** @test */
    public function createAccount()
    {
    }

    /** @test */
    public function updateAccount()
    {
    }

    /** @test */
    public function deleteAccount()
    {
    }

    /** @test */
    public function createAccountWithNullName()
    {
    }

    /** @test */
    public function createAccountWithNullPhone()
    {
        $account = factory(Account::class)->make(['phone'=>null])->toArray();

        $response = $this->post(route('account.store',$account));

        $response->assertSessionHasErrors(['phone'=>'The phone field is required.']);
    }

    /** @test */
    public function createAccountWithNullEmail()
    {
        $account = factory(Account::class)->make(['email'=>null])->toArray();

        $response = $this->post(route('account.store',$account));

        $response->assertSessionHasErrors(['email'=>'The email field is required.']);
    }

    /** @test */
    public function createAccountWithNullAddress()
    {
        $account = factory(Account::class)->make(['address'=>null])->toArray();

        $response = $this->post(route('account.store',$account));

        $response->assertSessionHasErrors(['address'=>'The address field is required.']);
    }

    /** @test */
    public function createAccountWithNameLessThan2Characters()
    {
        $account = factory(Account::class)->make(['name'=>'a'])->toArray();

        $response = $this->post(route('account.store',$account));

        $response->assertSessionHasErrors(['name'=>'The name must be at least 2 characters.']);
    }

    /** @test */
    public function createAccountWithNameGreaterThan50Characters()
    {
        $account = factory(Account::class)->make(['name'=>\Str::random(51)])->toArray();

        $response = $this->post(route('account.store',$account));

        $response->assertSessionHasErrors(['name'=>'The name may not be greater than 50 characters.']);
    }

    /** @test */
    public function createAccountWithEmailNotEmailFormat()
    {
        $account = factory(Account::class)->make(['email'=>'email'])->toArray();

        $response = $this->post(route('account.store',$account));

        $response->assertSessionHasErrors(['email'=>'The email must be a valid email address.']);
    }

    /** @test */
    public function createAccountWithNumberNotNumberFormat()
    {
        $account = factory(Account::class)->make(['number'=>'NotNumber'])->toArray();

        $response = $this->post(route('account.store',$account));

        $response->assertSessionHasErrors(['number'=>'The number must be a number.']);
    }

    /** @test */
    public function updateAccountWithNullName()
    {
        $account = factory(Account::class)->create();

        $editAccount = factory(Account::class)->make(['name'=>null])->toArray();

        $response = $this->put(route('account.update',$account->id),$editAccount);

        $response->assertSessionHasErrors(['name'=>'The name field is required.']);
    }

    /** @test */
    public function updateAccountWithNullPhone()
    {
        $account = factory(Account::class)->create();

        $editAccount = factory(Account::class)->make(['phone'=>null])->toArray();

        $response = $this->put(route('account.update',$account->id),$editAccount);

        $response->assertSessionHasErrors(['phone'=>'The phone field is required.']);
    }

    /** @test */
    public function updateAccountWithNullEmail()
    {
        $account = factory(Account::class)->create();

        $editAccount = factory(Account::class)->make(['email'=>null])->toArray();

        $response = $this->put(route('account.update',$account->id),$editAccount);

        $response->assertSessionHasErrors(['email'=>'The email field is required.']);
    }

    /** @test */
    public function updateAccountWithNullAddress()
    {
        $account = factory(Account::class)->create();

        $editAccount = factory(Account::class)->make(['address'=>null])->toArray();

        $response = $this->put(route('account.update',$account->id),$editAccount);

        $response->assertSessionHasErrors(['address'=>'The address field is required.']);
    }

    /** @test */
    public function updateAccountWithNameLessThan2Characters()
    {
        $account = factory(Account::class)->create();

        $editAccount = factory(Account::class)->make(['name'=>'a'])->toArray();

        $response = $this->put(route('account.update',$account->id),$editAccount);

        $response->assertSessionHasErrors(['name'=>'The name must be at least 2 characters.']);
    }

    /** @test */
    public function updateAccountWithNameGreaterThan50Characters()
    {
        $account = factory(Account::class)->create();

        $editAccount = factory(Account::class)->make(['name'=>\Str::random(51)])->toArray();

        $response = $this->put(route('account.update',$account->id),$editAccount);

        $response->assertSessionHasErrors(['name'=>'The name may not be greater than 50 characters.']);
    }

    /** @test */
    public function updateAccountWithEmailNotEmailFormat()
    {
        $account = factory(Account::class)->create();

        $editAccount = factory(Account::class)->make(['email'=>'email'])->toArray();

        $response = $this->put(route('account.update',$account->id),$editAccount);

        $response->assertSessionHasErrors(['email'=>'The email must be a valid email address.']);
    }

    /** @test */
    public function updateAccountWithNumberNotNumberFormat()
    {
        $account = factory(Account::class)->create();

        $editAccount = factory(Account::class)->make(['number'=>'NotNumber'])->toArray();

        $response = $this->put(route('account.update',$account->id),$editAccount);

        $response->assertSessionHasErrors(['number'=>'The number must be a number.']);
    }
}
