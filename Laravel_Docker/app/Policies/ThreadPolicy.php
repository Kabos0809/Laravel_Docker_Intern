<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Thread $thread)
    {
        return Auth::guard('users')->user()->id === $thread->user_id
                    ? Response::allow()
                    : Response::deny('不正な操作です');
    }

    public function delete(User $user, Thread $thread)
    {
        return Auth::guard('users')->user()->id === $thread->user_id
                    ? Response::allow()
                    : Response::deny('不正な操作です');
    }
}
