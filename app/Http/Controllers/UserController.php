<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('frontend.frontend_dashboard');
    } // end of index
}
