<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index($message = null): View|RedirectResponse
    {
        session('url.intended', session('url.intended'));

        if (Auth::check()) {
            $user = Auth::user();

            if (empty($user->osa) === true) {
                return view('osa', ['showform' => true, 'greeting' => $user->getGreetingArray()]);
            } elseif ($user->tos === true) {
                return redirect()->route('user.show', ['user' => $user->_id, 'message' => $message]);
            }

            return view('terms');
        } else {
            return view('login');
        }
    }

    public function osa(): View
    {
        return view('osa', ['showform' => false]);
    }
}
