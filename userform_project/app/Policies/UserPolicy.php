<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Разрешает просмотр списка пользователей только админам.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_admin;
    }
}
