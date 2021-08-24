<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function create(Request $request) {

        // Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:30',
            'cpassword' => 'required|min:6|max:30|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save) {
            return redirect()->back()->with('success', 'You are now registered successfuly');
        }else {
            return redirect()->back()->with('failure', 'Something went wrong, failed to register');
        }

    }

    public function check(Request $request) {

        // Validate
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists'
        ]);

        $creds = $request->only('email','password');
        if(Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home');
        }else {
            return redirect()->back()->with('failure', 'Incorrect credentials');
        }

    }

    public function logout() {

        Auth::guard('web')->logout();
        return redirect()->route('user.login');

    }

}
