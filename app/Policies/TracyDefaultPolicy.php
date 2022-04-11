<?php

namespace App\Policies;

use App\Models\TracyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class TracyDefaultPolicy
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

    /**
     * @param  TracyUser  $user
     * @return bool
     */
    public function viewAny(TracyUser $user): bool
    {
        return ($user->isAdmin());
    }

    /**
     * @param  TracyUser  $user
     * @return bool
     */
    public function view(TracyUser $user): bool
    {
        return ($user->isAdmin());
    }

    /**
     * @param  TracyUser  $user
     * @return bool
     */
    public function create(TracyUser $user): bool
    {
        return false;
    }

    /**
     * @param  TracyUser  $user
     * @return bool
     */
    public function update(TracyUser $user): bool
    {
        return false;
    }

    /**
     * @param  TracyUser  $user
     * @return bool
     */
    public function delete(TracyUser $user): bool
    {
        return false;
    }

    /**
     * @param  TracyUser  $user
     * @return bool
     */
    public function forceDelete(TracyUser $user): bool
    {
        return false;
    }

    /**
     * @param  TracyUser  $user
     * @return bool
     */
    public function restore(TracyUser $user): bool
    {
        return false;
    }
}
