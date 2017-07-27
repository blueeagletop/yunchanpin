<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\User;

class UserController extends Controller
{
    public function user() {
        $users=User::all();
        return view('admin.user')->with('users',$users);
    }

}
