<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;

class ReplyPolicy
{
    /**
     * Create a new policy instance.
     * las politicas son restricciones para con los usuarios a hacer cosas 
     */
    public function update(User $user, Reply $reply){
        return $user->id === $reply->user_id;//true, false
    }
}
