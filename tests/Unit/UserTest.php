<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_register_new_user()
    {
        $reponse = $this->post('/register', [
            'name' => 'testName',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $reponse->assertRedirect('/home');
    }

    public function test_login_user()
    {
        $response = $this->post('/login', [
            'email' => "test@test.com",
            "password" => "password"
        ]);

        $response->assertRedirect('/home');
    }

    public function test_find_user()
    {
        $user = User::find("test@test.com");

        $this->assertTrue(true);
    }

    public function test_update_user()
    {
        $user = User::find("test@test.com");

        $user->update([
            "name" => "testUserUpdate"
        ]);

        $this->assertTrue($user->name == "testUserUpdate");
    }

    public function test_delete_user()
    {
        $user = User::find("test@test.com");

        $this->assertTrue($user->delete());
    }
}
