<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(): View
    {
        return view('komisi.inputuser');
    }
    public function store(Request $request)
    {
        $post = User::create([
            'name'     => $request->input('name'),
            'email'      => $request->input('email'),
            'password'      => $request->input('password'),
            'remember_token'      => $request->input('remember_token'),
        ]);

        return redirect('/admin');
    }
}
