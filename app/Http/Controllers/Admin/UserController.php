<?php

namespace App\Http\Controllers\Admin;

use Kreait\Firebase\Contract\Database;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user');
    }
}
