<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Auth\Access\HandlesAuthorization;

class DataPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function view(User $user, Kelas  $kelas)
{
    return $user->role === 'dosen' && $user->id === $kelas->user_id;
}
}
