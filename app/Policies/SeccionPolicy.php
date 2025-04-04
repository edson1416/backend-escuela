<?php

namespace App\Policies;

use App\Models\Seccion;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SeccionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny( null|User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(null|User $user, Seccion $seccion): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['administrador', 'director']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Seccion $seccion): bool
    {
        return $user->hasAnyRole(['administrador', 'director']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Seccion $seccion): bool
    {
        return $user->hasAnyRole(['administrador', 'director']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Seccion $seccion): bool
    {
        return $user->hasAnyRole(['administrador', 'director']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Seccion $seccion): bool
    {
        return false;
    }
}
