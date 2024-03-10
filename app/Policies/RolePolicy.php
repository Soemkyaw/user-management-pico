<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{


    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        // return $user->role->permissions->pluck('id')->contains(5);
        return $user->hasPermission('View','role');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->role->permissions->pluck('id')->contains(6);
        return $user->hasPermission('Create','role');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        // return $user->role->permissions->pluck('id')->contains(7);
        return $user->hasPermission('Update','role');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        // return $user->role->permissions->pluck('id')->contains(8);
        return $user->hasPermission('Delete','role');
    }

}
