<?php

namespace App\Http\Controllers;

use App\Models\profil;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = profil::latest()->get();
        return view('admin.user', compact('profils'));
    }
    public function create(): View
    {
        $users = User::all();
        return view('admin.inputprofil', compact('users'));
    }
    public function store(Request $request)
    {
        $post = profil::create([
            'users_id'     => $request->input('users_id'),
            'alamat'      => $request->input('alamat'),
            'no_hp'      => $request->input('no_hp')
        ]);
        return redirect('/admin');
    }
}
