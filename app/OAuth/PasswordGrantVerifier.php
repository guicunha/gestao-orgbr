<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 24/12/15
 * Time: 17:15
 */

namespace CodeProject\OAuth;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}