<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRole;
use Auth;
use Snarl;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('roles.index', [
            'users' => User::where('name', '!=', Auth::user()->name)->get(),
            'roles' => Role::all()
        ]);
    }

    public function edit(UpdateRole $request) {
        $user = User::findByName($request->input('username'))->first();
        $user->syncRoles();
        if($request->input('role') != 'none')
            $user->assignRole($request->input('role'));

        Snarl::setSuccessMsg('Success', 'The Role assginment was successful!');
        return redirect()->back();
    }
}
