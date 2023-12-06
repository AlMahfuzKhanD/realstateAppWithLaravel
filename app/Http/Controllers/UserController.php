<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('frontend.index');
    } // end of index
}
