<?php

namespace App\Http\Controllers\Backend;

use DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function AllTestimonial(){
        $testimonial = Testimonial::latest()->get();
        return view('backend.testimonial.all_testimonial',compact('testimonial'));
    } //end method

    public function AddTestimonial(){
        return view('backend.testimonial.add_testimonial');
    } //end method
    public function StoreTestimonial(Request $request){

        // Validation
        $request->validate([
            'name' => 'required',
        ]);

        
        DB::beginTransaction();

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        try {
            if($request->file('image')){
                $selected_image = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$selected_image->getClientOriginalExtension();
                $img = $manager->read($selected_image);
                $img = $img->resize(370,250);
                $img->toJpeg(80)->save(base_path('public/upload/property/testimonial/'.$name_gen));
                $save_url = 'upload/property/testimonial/'.$name_gen;
            }
    
            Testimonial::insert([
                'name' => $request->name,
                'name' => $request->message,
                'position' => $request->position,
                'image' => $request->image,
                'image' => $save_url
            ]);
    
            $notification = array(
                'message' => 'Testimonial Created successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('all.testimonial')->with($notification);

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with($notification);
            // something went wrong
        }

    } //end method

    public function EditTestimonial($id){

        // Validation
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit_testimonial',compact('testimonial'));

    } //end method

    public function UpdateTestimonial(Request $request){
       
        $testimonial_id = $request->testimonial_id;
        $old_testimonial_image = $request->old_testimonial_image;
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {

            if($request->file('image')){

                $selected_image = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$selected_image->getClientOriginalExtension();
                $img = $manager->read($selected_image);
                $img = $img->resize(370,250);
                $img->toJpeg(80)->save(base_path('public/upload/property/testimonial/'.$name_gen));
                $save_url = 'upload/property/testimonial/'.$name_gen;
            }

            if(file_exists($old_testimonial_image)){
                unlink($old_testimonial_image);
            }

            State::findOrFail($testimonial_id)->update([
                'name' => $request->name,
                'name' => $request->message,
                'position' => $request->position,
                'image' => $request->image,
                'image' => $save_url
            ]);


            $notification = array(
                'message' => 'Testimonial Updated successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('all.testimonial')->with($notification);

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

    public function DeleteTestimonial($id){

        
        $testimonial = Testimonial::findOrFail($id);
        $img = $testimonial->image;
        unlink($img);
        
        $testimonial->delete();

        $notification = array(
            'message' => 'Testimonial Deleted successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->back()->with($notification);

    } //e
}
