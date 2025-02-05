<?php

namespace App\Policies;

use App\Models\SolicitudInscripcion;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SolicitudInscripcionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SolicitudInscripcion $solicitudInscripcion): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(null|User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SolicitudInscripcion $solicitudInscripcion): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SolicitudInscripcion $solicitudInscripcion): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SolicitudInscripcion $solicitudInscripcion): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SolicitudInscripcion $solicitudInscripcion): bool
    {
        return false;
    }
}
