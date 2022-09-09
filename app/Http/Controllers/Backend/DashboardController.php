<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\User;

class DashboardController extends Controller {
    public function dashboard() {
        $data           = [];
        $data['user']   = User::count();
        $data['outlet'] = Outlet::count();

        return view('backend.dashboard', $data);
    }
}
