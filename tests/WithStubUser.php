<?php

namespace Tests;

use App\Models\User;

trait WithStubUser
{
    /**
     * @var \App\Models\User
     */
    protected $admin;

    public function createStubUser(array $data = [])
    {
        $data = array_merge([
            'name' => 'Test Admin',
            'email' => 'test-admin-'.uniqid().'@example.com',
            'passwordhash' => bcrypt('password'),
        ], $data);

        return $this->admin = User::create($data);
    }

    public function deleteStubUser()
    {
        $this->admin->forceDelete();
    }
}
