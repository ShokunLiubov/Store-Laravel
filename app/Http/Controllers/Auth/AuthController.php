<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function auth(string $action): View
    {
        return view('page.public.auth', compact('action'));
    }
}
