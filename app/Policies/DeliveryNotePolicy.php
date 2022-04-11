<?php

namespace App\Policies;

use App\Models\TracyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryNotePolicy extends TracyDefaultPolicy
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

    public function view(TracyUser $user): bool
    {
        return true;
    }

    public function viewAny(TracyUser $user): bool
    {
        return true;
    }
}
