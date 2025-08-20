<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
abstract class Controller
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//    use MedusaPermissions;
//    use MedusaAudit;

    public function __construct()
    {
        if (Auth::check() !== true) {
            redirect()->action([ HomeController::class, 'index']);
        }
        View::share('permsObj', $this);
        View::share('user', Auth::user());
    }
}
