<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    
    public function create(Request $request) {

        // Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email',
            'hospital' => 'required',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|same:password|min:5|max:30'
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->hospital = $request->hospital;
        $doctor->password = Hash::make($request->password);
        $save = $doctor->save();

        if($save) {
            return redirect()->back()->with('success', 'You are now registered succcessfully as a doctor');
        }else {
            return redirect()->back()->with('failure', 'Something went wrong, failed to register');
        }

    }

    public function check(Request $request) {

        // Validate
        $request->validate([
            'email' => 'required|email|exists:doctors,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is no exists'
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::guard('doctor')->attempt($creds)) {
            return redirect()->route('doctor.home');
        }else {
            return redirect()->back()->with('failure', 'Incorrect Credentials');
        }

    }

    public function logout() {

        Auth::guard('doctor')->logout();
        return redirect('/');

    }

}
