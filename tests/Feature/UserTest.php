<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testAuth()
    {
        $this->seed(UserSeeder::class);

        $success = Auth::attempt([
            "email" => "farel@localhost",
            "password" => "rahasia"
        ], true);
        self::assertTrue($success);

        $user = Auth::user();
        self::assertNotNull($user);
        self::assertEquals("farel@localhost", $user->email);
    }

    public function testGuest()
    {
        $user = Auth::user();
        self::assertNull($user);
    }
}
