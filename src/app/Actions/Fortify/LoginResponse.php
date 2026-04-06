<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();
        if (!$user->profile_set) {
            return redirect('/profile');
        }

        return redirect('/'); // ← 好きな遷移先に変更
    }
}
