<?php

namespace Tests\Feature\CrudTesting;

use App\Models\Contact;
use Tests\TestCase;

class ContactCrudTesting extends TestCase
{
    public function setUp():void
    {
        parent::setUp();

        //Login as Admin
        $this->post('/admin/login',['email'=>'dev@dev.com','password'=>'123456789']);
    }

    /** @test */
    public function listAllContacts()
    {
        $response = $this->get(route('contact.index'));

        $response->assertViewIs('crud::list');
    }

    /** @test */
    public function previewContactDetail()
    {
        $contact = factory(Contact::class)->create();

        $response = $this->get(route('contact.show',$contact->id));

        $response->assertViewIs('crud::show');
        $response->assertViewHas('entry',$contact);
    }

    /** @test */
    public function createContact()
    {
        $contact = factory(Contact::class)->make()->toArray();

        $response = $this->post(route('contact.store',$contact));

        $response->assertRedirect('/admin/contact');
        $this->assertDatabaseHas('contacts',$contact);
    }

    /** @test */
    public function updateContact()
    {
        $contact = factory(Contact::class)->create();

        $editcontact = factory(Contact::class)->make(['id'=>$contact->id])->toArray();

        $response = $this->put(route('contact.update',$contact->id),$editcontact);

        $response->assertRedirect('/admin/contact');
        $this->assertDatabaseHas('contacts',$editcontact);
    }

    /** @test */
    public function deleteContact()
    {
        $contact = factory(Contact::class)->create();

        $response = $this->delete(route('contact.destroy',$contact->id));

        $response->assertSuccessful();
        $this->assertDatabaseMissing('contacts',$contact->toArray());
    }

    /** @test */
    public function createContactWithNullFirstName()
    {
        $contact = factory(Contact::class)->make(['first_name'=>null])->toArray();

        $response = $this->post(route('contact.store',$contact));

        $response->assertSessionHasErrors(['first_name'=>'The first name field is required.']);
    }
}
