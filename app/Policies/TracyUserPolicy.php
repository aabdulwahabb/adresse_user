<?php

namespace App\Policies;

use App\Models\TracyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class TracyUserPolicy extends TracyDefaultPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(TracyUser $user): bool
    {
        return ($user->isAdmin());
    }

    public function update(TracyUser $user): bool
    {
        return ($user->isAdmin());
    }

    public function delete(TracyUser $user): bool
    {
        return ($user->isAdmin());
    }

    public function forceDelete(TracyUser $user): bool
    {
        return ($user->isAdmin());
    }
}
