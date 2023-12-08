<?php

namespace App\Http\Controllers\Backend;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Builder\Property;

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
}
