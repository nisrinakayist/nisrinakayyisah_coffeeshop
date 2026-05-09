<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

//         /**
//      * Show the reset password form.
//      *
//      * @param  string  $token
//      * @return \Illuminate\View\View
//      */
//     public function getPassword($token)
//     {
//         return view('auth.passwords.reset', ['token' => $token]);
//     }

//     /**
//      * Handle the password reset process.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\RedirectResponse
//      */
//    public function updatePassword(Request $request)
//     {
//         $request->validate([
//             'token' => 'required',
//             'email' => 'required|email',
//             'password' => 'required|min:6|confirmed',
//         ]);

//         $response = Password::broker()->reset(
//             $request->only('email', 'password', 'password_confirmation', 'token'),
//             function ($user, $password) {
//                 $user->password = Hash::make($password);
//                 $user->save();
//             }
//         );

//         return $response == Password::PASSWORD_RESET
//             ? redirect('/login')->with('success', 'Password berhasil direset!')
//             : back()->withErrors(['email' => [__($response)]]);

        
//     }


    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
}
