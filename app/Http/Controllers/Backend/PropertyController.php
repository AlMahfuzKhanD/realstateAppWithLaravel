<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Property;
use App\Models\Amenities;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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

    public function StoreProperty(Request $request){

        if($request->file('property_thumbnail')){
            $selected_image = $request->file('property_thumbnail');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$selected_image->getClientOriginalExtension();
            $img = $manager->read($selected_image);
            $img = $img->resize(370,250);
            $img->toJpeg(80)->save(base_path('public/upload/property/thumbnail/'.$name_gen));
            $save_url = 'upload/property/thumbnail/'.$name_gen;
        }
        
        $amen = $request->amenities_id;
        $amenities = implode(",",$amen);

        $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code','length' => 5, 'prefix' =>'PC']);


        $property = Property::insertGetId([
            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenities,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ','-',$request->property_name)),
            'property_code' => $pcode,
            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'maximum_price' => $request->maximum_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,
            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'status' => 1,
            'property_thumbnail' => $save_url
        ]);
    } // end of StoreProperty
}
