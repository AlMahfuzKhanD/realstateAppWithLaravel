<?php

namespace App\Http\Controllers\Backend;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{
    public function AllType(){
        $type = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('type'));
    } //end method
}
