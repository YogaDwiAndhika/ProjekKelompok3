<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Karyawan;

class KaryawanPolicy
{
    /**
     * Determine whether the user can view any karyawan.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can view the karyawan.
     */
    public function view(User $user, Karyawan $karyawan)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can create karyawan.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the karyawan.
     */
    public function update(User $user, Karyawan $karyawan)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the karyawan.
     */
    public function delete(User $user, Karyawan $karyawan)
    {
        return $user->role === 'admin';
    }
}