<?php

namespace App\Policies;

use App\Models\CategoriaAsignatura;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoriaAsignaturaPolicy
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
    public function view(User $user, CategoriaAsignatura $categoriaAsignatura): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CategoriaAsignatura $categoriaAsignatura): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CategoriaAsignatura $categoriaAsignatura): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CategoriaAsignatura $categoriaAsignatura): bool
    {
        return $user->hasAnyRole(['administrador','director']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CategoriaAsignatura $categoriaAsignatura): bool
    {
        return true;
    }
}
