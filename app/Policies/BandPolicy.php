<?php

namespace App\Policies;

use App\Models\Band;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any bands.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the band.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Band  $band
     * @return mixed
     */
    public function view(User $user, Band $band)
    {
        // of course if the user has a batch this means he is a student but if not this means he is an instructor
        // if the user is instructor this means he owns one of bands
        // Now i can check if the authenticated user is the instructor of the selected band
        // but for a performance i will skip this and i will just check if he is an instructor or not
        // because at the end i will pass his band information. "The band is not requested"

        // if you need to check if the user owns his band
        // return $user->band->hasOwner($user);

        return $user->ownsAnyBand();
    }

    /**
     * Determine whether the user can create bands.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the band.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Band  $band
     * @return mixed
     */
    public function update(User $user, Band $band)
    {
        return $band->hasOwner($user);
    }

    /**
     * Determine whether the user can delete the band.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Band  $band
     * @return mixed
     */
    public function delete(User $user, Band $band)
    {
        //
    }

    /**
     * Determine whether the user can restore the band.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Band  $band
     * @return mixed
     */
    public function restore(User $user, Band $band)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the band.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Band  $band
     * @return mixed
     */
    public function forceDelete(User $user, Band $band)
    {
        //
    }

}
