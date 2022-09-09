<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public function login() {
        return view('backend.auth.login');
    }

    public function storeLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return to_route('dashboard');
        }

        return to_route('login')->withToastError('Invalid Credentitials!!');

    }

    public function logout(Request $request) {
        Auth::logout();

        return to_route('login')
            ->withToastSuccess('Logout Successful!!');
    }

}
