<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }
}
