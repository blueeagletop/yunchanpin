<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\Admin;

class AdminController extends Controller {
    public function admin() {
        $admins = Admin::all();
        return view('admin.admin')->with('admins', $admins);
    }
}
