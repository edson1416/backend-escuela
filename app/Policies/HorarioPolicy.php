<?php

namespace App\Policies;

use App\Models\Horario;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HorarioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(null|User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(null|User $user, Horario $horario): bool
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
    public function update(User $user, Horario $horario): bool
    {
        return $user->hasAnyRole(['administrador', 'director']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Horario $horario): bool
    {
        return $user->hasAnyRole(['administrador', 'director']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Horario $horario): bool
    {
        return $user->hasAnyRole(['administrador', 'director']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Horario $horario): bool
    {
        return false;
    }
}
