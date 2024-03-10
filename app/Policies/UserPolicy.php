<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        // return $user->role->permissions->pluck('id')->contains(1);
        return $user->hasPermission('View','user');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->role->permissions->pluck('id')->contains(2);
        return $user->hasPermission('Create','user');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        // return $user->role->permissions->pluck('id')->contains(3);
        return $user->hasPermission('Update','user');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        // return $user->role->permissions->pluck('id')->contains(4);
        return $user->hasPermission('Delete','user');
    }

}
