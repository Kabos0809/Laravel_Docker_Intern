<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response as Res;


class ResponsePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Response $response)
    {
        return Auth::guard('users')->user()->id === $response->user_id
                    ? Res::allow()
                    : Res::deny('不正な操作です');
    }

    public function delete(User $user, Response $response)
    {
        return Auth::guard('users')->user()->id === $response->user_id
                    ? Res::allow()
                    : Res::deny('不正な操作です');
    }
}
