<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('name', 'ASC')->get();

        return view('admin.master.user.index', compact('users'));
    }

    public function create() {
        return view('admin.master.user.create');
    }
}
