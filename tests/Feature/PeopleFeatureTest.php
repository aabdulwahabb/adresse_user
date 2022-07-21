<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\XentralUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\WithStubUser;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PeopleFeatureTest extends TestCase
{
    use DatabaseTransactions, WithStubUser;

    public function test_index_authentication()
    {
        //login
        $this->assertAuthenticationRequired('/login');
        $this->assertAuthenticationRequired('/register');
        $this->assertAuthenticationRequired('/users/login', 'post');
        $this->assertAuthenticationRequired('/users/register', 'post');
        $this->assertAuthenticationRequired('/users/logout');
        // Update Admin
        $this->assertAuthenticationRequired('users/setting/admin/id=1/edit');
        $this->assertAuthenticationRequired('/users/setting/admin', 'put');
        // User Page
        $this->assertAuthenticationRequired('/users');
        $this->assertAuthenticationRequired('/users/setting');
        $this->assertAuthenticationRequired('/users/create');
        $this->assertAuthenticationRequired('/users/id=1');
        $this->assertAuthenticationRequired('/users/id=1/edit');
        // store Xentral User
        $this->assertAuthenticationRequired('/users', 'post');
         // Update User
        $this->assertAuthenticationRequired('/users', 'put');
        $this->assertAuthenticationRequired('/users/setting', 'put');
        $this->assertAuthenticationRequired('/users/setting/admin/status');
        $this->assertAuthenticationRequired('/users/setting/status');

    }

    public function test_index_view()
    {
        $admin = $this->createStubUser();
        $response = $this->actingAs($admin)->get('/users');

        $response->assertStatus(200);
        $response->assertViewHas('users');
        $response->assertSee('<span>Users</span>');
    }

    public function test_authenticated_admin_can_create_new_user()
    {
        $this->actingAs($this->createStubUser());

        $this->get('/users/create')
            ->assertStatus(200)
            ->assertViewIs('users.create')
            ->assertViewHas('user', null);

        $this->post('/users', ['username' => 'Hanoi'])
            ->assertRedirect('/users/id={id}')
            ->assertSessionHas('created', XentralUser::latest()->first()->id);
    }

    public function test_authenticated_admin_can_view_a_user()
    {
        $user = $this->createUser();

        $this->get("/users/{$user->id}")
            ->assertStatus(200)
            ->assertViewIs('users.show')
            ->assertViewHas('user');
    }

    public function test_authenticated_admin_can_edit_an_existing_user()
    {
        $user = $this->createUser();

        $this->get("/users/{$user->id}/edit")
            ->assertStatus(200)
            ->assertViewIs('user.edit')
            ->assertViewHas('user');

        $this->put("/users", ['username' => 'London'])
            ->assertRedirect('/users')
            ->assertSessionHas('updated', $user->id);
    }

    private function createUser($authenticated = true)
    {
        $user = XentralUser::factory()->create();

        if ($authenticated) {
            $this->actingAs($this->createStubUser());
        }
        return $user;
    }
}
