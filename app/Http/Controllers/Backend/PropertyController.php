<?php

namespace App\Http\Controllers\Backend;

use App\Models\Property;
use App\Models\Amenities;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function AllProperty(){
        $property = Property::latest()->get();
        return view('backend.property.all_property',compact('property'));
    } // end of AllProperty

    public function AddProperty(){
        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();
        return view('backend.property.add_property',compact('propertyType','amenities','activeAgent'));
    } // end of AddProperty
}
