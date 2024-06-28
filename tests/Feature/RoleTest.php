<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanShowRolePage()
    {
        // $user = User::role('admin')->get();
        // dd($user);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
