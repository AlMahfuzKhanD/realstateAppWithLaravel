<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\MultiImage;

class IndexController extends Controller
{
    public function PropertyDetails($id,$slug){
        $property = Property::findOrFail($id)->first();
        $amenities = $property->amenities_id;
        $amenities = explode(',',$amenities);
        $property_images = MultiImage::where('property_id',$id)->get();
        $facilities = Facility::where('property_id',$id)->get();
        $type_id = $property->ptype_id;
        $similer_property = Property::where('ptype_id',$type_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.property.property_details',compact('property','property_images','amenities','facilities','similer_property'));
    } // end method
}
