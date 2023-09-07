<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;

class LinkPolicy
{
    public function update(User $user, Link $link): bool
    {
        return $user->id === $link->user_id;
    }
}
