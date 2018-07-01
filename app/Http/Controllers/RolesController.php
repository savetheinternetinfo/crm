<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index() {
        return view('roles.index', [
            'users' => User::where('name', '!=', Auth::user()->name)->get(),
            'roles' => Role::all()
        ]);
    }
}
