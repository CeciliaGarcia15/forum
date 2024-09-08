<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;

class ThreadPolicy
{
    /**
     * Create a new policy instance.
     * esto hace que un usuario solo pueda editar sus propias preguntas
     */
    public function update(User $user, Thread $thread){
        return $user->id === $thread->user_id;//true, false
    }
}
