<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
            'state_name' => 'required|unique:states|max:200',
            'state_image' => 'required',
        ]);

        
        DB::beginTransaction();

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        try {
            if($request->file('state_image')){
                $selected_image = $request->file('state_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$selected_image->getClientOriginalExtension();
                $img = $manager->read($selected_image);
                $img = $img->resize(370,250);
                $img->toJpeg(80)->save(base_path('public/upload/property/state/'.$name_gen));
                $save_url = 'upload/property/state/'.$name_gen;
            }
    
            State::insert([
                'state_name' => $request->state_name,
                'state_imag' => $save_url
            ]);
    
            $notification = array(
                'message' => 'State Created successfully!!',
                'alert-state' => 'success'
            );
            DB::commit();
            return redirect()->route('all.state')->with($notification);

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with($notification);
            // something went wrong
        }

    } //end method

    public function Editstate($id){

        // Validation
        $state = State::findOrFail($id);
        return view('backend.state.edit_state',compact('state'));

    } //end method

    public function UpdateState(Request $request){
       
        $state_id = $request->state_id;
        $old_state_image = $request->old_state_image;
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {

            if($request->file('state_image')){

                $selected_image = $request->file('state_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$selected_image->getClientOriginalExtension();
                $img = $manager->read($selected_image);
                $img = $img->resize(370,250);
                $img->toJpeg(80)->save(base_path('public/upload/property/state/'.$name_gen));
                $save_url = 'upload/property/state/'.$name_gen;
            }

            if(file_exists($old_state_image)){
                unlink($old_state_image);
            }

            State::findOrFail($state_id)->update([
                'state_name' => $request->state_name,
                'state_imag' => $save_url
            ]);


            $notification = array(
                'message' => 'State Updated successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('all.state')->with($notification);

            // all good
        } catch (\Exception $e) {
            
            DB::rollback();
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
            // something went wrong
        }

        

    } // end of UpdatePropertyThumbnail

    public function DeleteState($id){

        
        State::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Deleted successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->back()->with($notification);

    } //e
}
