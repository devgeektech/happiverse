<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index(User $user)
    {
        return view('change-password.index', [
            'user' => $user
        ]);
    }
}
