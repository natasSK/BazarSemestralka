<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Advert;
use App\Models\User;

class AdvertPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Advert $advert): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Advert $advert)
    {
        return $user->role === 'admin' || $user->id === $advert->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id || $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Advert $advert): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Advert $advert): bool
    {
        //
    }
}
