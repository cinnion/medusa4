<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use function response;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
            'redirect_to' => 'nullable|url',
        ];

        $validated = $request->validate($rules);

        $email = $validated['email'];
        $password = $validated['password'];
        $redirect = (isset($validated['redirect_to']) ? $validated['redirect_to'] : '/');

        if (Auth::attempt([
            'email_address' => strtolower($email),
            'password' => $password,
            'active' => 1,
        ])) {
            User::find(Auth::id())->update([
                'last_login' => now(),
            ]);

//            event(new LoginComplete(Auth::user()));

            // Get last forum login
            if ($_SERVER['SERVER_NAME'] == 'medusa.trmn.org') {
                try {
//                    $lastForumLogin = ForumUser::where('user_email', strtolower($email))
//                        ->firstOrFail(['user_lastvisit'])
//                        ->toArray();

//                    Auth::user()->forum_last_login = $lastForumLogin['user_lastvisit'];
                } catch (Exception $e) {
                    Auth::user()->forum_last_login = false;
                }
            }

            Auth::user()->save();

            // Don't redirect back to the signin page
            if (basename($redirect) === 'signin') {
                $redirect = '/';
            }
//            Log::debug("Redirecting to " . $redirect);
            return Redirect::to($redirect);
        } else {
            return Redirect::back()
                ->with('message', 'Your username/password combination was incorrect')
                ->withInput();
        }
    }

    public function signout()
    {
        Auth::logout();
        Session::flush();

        return Redirect::intended('/');
    }
}
