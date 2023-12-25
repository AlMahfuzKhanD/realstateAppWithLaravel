<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Facility;
use App\Models\Property;
use App\Models\Amenities;
use App\Models\MultiImage;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
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

        

        DB::beginTransaction();

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        try {
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
            // dd($request->all(),$amenities);
            $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code','length' => 5, 'prefix' =>'PC']);
    
    
            $property_id = Property::insertGetId([
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
            
            // Upload multi_img 
            if($property_id){
                
                // Upload multi_img 
                $images = $request->file('multi_img');
                foreach($images as $multi_img){
        
                    $manager = new ImageManager(new Driver());
                    $generate_name = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
                    $mul_img = $manager->read($multi_img);
                    $mul_img = $mul_img->resize(770,520);
                    $mul_img->toJpeg(80)->save(base_path('public/upload/property/multi-image/'.$generate_name));
                    $uploaded_url = 'upload/property/multi-image/'.$generate_name;
        
                    MultiImage::insert([
                        'property_id' => $property_id,
                        'photo_name' => $uploaded_url
                    ]);
        
                } // end foreach
                
                // facility
                $facilities = Count($request->facility_name);
                // dd($request->all(),$facilities);
                if($facilities != NULL){
                    for ($i=0; $i < $facilities; $i++) { 
                        $facility = new Facility();
                        $facility->property_id = $property_id;
                        $facility->facility_name = $request->facility_name[$i];
                        $facility->distance = $request->distance[$i];
                        $facility->save();
    
                    }
                }
            }

            $notification = array(
                'message' => 'Property Created successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('all.property')->with($notification);

            // all good
        } catch (\Exception $e) {

            DB::rollback();
            return back()->with($notification);
            // something went wrong
        }
        

    } // end of StoreProperty

    public function EditProperty($id){

        $property = Property::findOrFail($id);

        $property_aminity = $property->amenities_id;
        $property_aminity = explode(',',$property_aminity);
        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

        return view('backend.property.edit_property',compact('property','propertyType','amenities','activeAgent','property_aminity'));

    } // end of EditProperty

    public function UpdateProperty(Request $request){

        $property_id = $request->id;
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            
            $amen = $request->amenities_id;
            $amenities = implode(",",$amen);
    
            Property::findOrFail($property_id)->update([
                'ptype_id' => $request->ptype_id,
                'amenities_id' => $amenities,
                'property_name' => $request->property_name,
                'property_slug' => strtolower(str_replace(' ','-',$request->property_name)),
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
                'updated_at' => Carbon::now()
            ]);
            
            

            $notification = array(
                'message' => 'Property Updated successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('all.property')->with($notification);

            // all good
        } catch (\Exception $e) {

            DB::rollback();
            return back()->with($notification);
            // something went wrong
        }

        

    } // end of UpdateProperty
}
