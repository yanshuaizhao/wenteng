<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/20
 * Time: 3:07
 */

namespace App\Exceptions;

use Illuminate\Http\Request;

trait AuthenticatesLogout
{

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->forget($this->guard()->getName());

        $request->session()->regenerate();

        return redirect('/');
    }

}