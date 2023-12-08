<?php

namespace App\Http\Controllers\Backend;

use App\Models\PropertyType;
use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PropertyTypeController extends Controller
{
    public function AllType(){
        $type = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('type'));
    } //end method

    public function AddType(){
        
        return view('backend.type.add_type');
    } //end method

    public function StoreType(Request $request){

        // Validation
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required',
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type Created successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);

    } //end method

    public function EditType($id){

        // Validation
        $type = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('type'));

    } //end method

    public function UpdateType(Request $request){

        // Validation
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required',
        ]);
        
        PropertyType::findOrFail($request->type_id)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type Updated successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);

    } //end method

    public function DeleteType($id){

        
        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Type Deleted successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    } //end method


    // Amenities All method

    public function AllAmenitie(){
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_aminitie',compact('amenities'));
    } //end method

    // Add 
    public function AddAmenitie(){
        
        return view('backend.amenities.add_aminitie');
    } //end method StoreAmenitie

    public function StoreAmenitie(Request $request){

        // Validation
        $request->validate([
            'amenities_name' => 'required|unique:amenities|max:200'
        ]);

        Amenities::insert([
            'amenities_name' => $request->amenities_name
        ]);

        $notification = array(
            'message' => 'Amenitie Created successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenitie')->with($notification);

    } //end method
}
