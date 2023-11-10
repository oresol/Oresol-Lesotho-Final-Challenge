<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests\ChangePasswordRequest;


class UserController extends Controller
{
    public function update_password(ChangePasswordRequest $request)
    {
        
        if(Hash::check($request->old_password, auth()->user()->password))
        {
            auth()->user()->update([
                'password'=> Hash::make($request->new_password) 
            ]);

            return back()->with(['success' => ' User password updated.']);

        }
        else
        {
            return back()->withErrors(['error' => ' Old password not found.']);
        }

    }

    public function edit()
    {
        return view('user.changep');
    }

    public function index()
    {
        return view('user.index');
    }
}
