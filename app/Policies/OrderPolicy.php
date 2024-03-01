<?php

namespace App\Policies;

use App\Models\Orden;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Orden $orden){
        return true;
    }

    // public function payment(User $user, Orden $orden){
    //     if ($orden->status == 1) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}