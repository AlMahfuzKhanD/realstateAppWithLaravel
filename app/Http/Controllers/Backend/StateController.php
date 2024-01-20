<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function AllState(){
        $state = State::latest()->get();
        return view('backend.state.all_state',compact('state'));
    } //end method

    public function AddState(){
        
        return view('backend.state.add_state');
    } //end method

    public function StoreState(Request $request){

        // Validation
        $request->validate([
            'state_name' => 'required|unique:property_states|max:200',
            'state_icon' => 'required',
        ]);

        State::insert([
            'state_name' => $request->state_name,
            'state_icon' => $request->state_icon
        ]);

        $notification = array(
            'message' => 'Property state Created successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->route('all.state')->with($notification);

    } //end method

    public function Editstate($id){

        // Validation
        $state = State::findOrFail($id);
        return view('backend.state.edit_state',compact('state'));

    } //end method

    public function Updatestate(Request $request){

        // Validation
        $request->validate([
            'state_name' => 'required|unique:property_states|max:200',
            'state_icon' => 'required',
        ]);
        
        State::findOrFail($request->state_id)->update([
            'state_name' => $request->state_name,
            'state_icon' => $request->state_icon
        ]);

        $notification = array(
            'message' => 'Property state Updated successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->route('all.state')->with($notification);

    } //end method

    public function Deletestate($id){

        
        State::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property state Deleted successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->back()->with($notification);

    } //e
}
