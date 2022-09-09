<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    public function index() {
        $users = User::all();

        return view('backend.user.index', compact('users'));
    }

    public function create() {
        return view('backend.user.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required:min:8',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return to_route('user.index')->withToastSuccess('New user added Successfully!!');
    }

    public function edit(User $user) {
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->update();

        return to_route('user.index')->withToastSuccess('The user updated successfully!!');
    }

    public function delete(Request $request, User $user) {
        if($user->id == Auth::id()){
            return back();
        }
        $user->delete();

        return to_route('user.index')->withToastSuccess('The admin deleted successfully!!');
    }

}
