<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function loginWithCorrectUser()
    {
        $user = ['email'=>'dev@dev.com','password'=>'123456789'];   // Given
        $response = $this->post('/admin/login',$user);              // When
        $response->assertRedirect('/admin/dashboard');              // Then
    }

    /** @test */
    public function loginWithIncorrectEmail()
    {
        $user = ['email'=>'incorrect@dev.com','password'=>'123456789'];
        $response = $this->post('/admin/login',$user);
        $response->assertSessionHasErrors(['email'=>'These credentials do not match our records.']);
    }

    /** @test */
    public function loginWithIncorrectPassword()
    {
        $user = ['email'=>'dev@dev.com','password'=>'incorrect'];
        $response = $this->post('/admin/login',$user);
        $response->assertSessionHasErrors(['email'=>'These credentials do not match our records.']);
    }

    /** @test */
    public function loginWithIncorrectEmailAndPassword()
    {
        $user = ['email'=>'incorrect@dev.com','password'=>'incorrect'];
        $response = $this->post('/admin/login',$user);
        $response->assertSessionHasErrors(['email'=>'These credentials do not match our records.']);
    }
}
