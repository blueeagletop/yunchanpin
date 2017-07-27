<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BeContinueController extends Controller
{
    public function beContinue() {
        return view('admin.beContinue');
    }
}
