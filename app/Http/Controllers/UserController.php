<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\State;
use App\Models\BlogPost;
use App\Models\Property;
use App\Models\Schedule;
use App\Models\Testimonial;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $p_type = PropertyType::get();
        $property_type = $p_type->take(5);
        $properties = Property::get();
        $feature_properties = $properties->where('status',1)->where('featured',1)->take(3)->all();
        $hot_properties = $properties->where('status',1)->where('hot',1)->take(3)->all();
        $agents = User::where('status','active')->where('role','agent')->orderBy('id','DESC')->limit(5)->get();
        $states = State::latest()->get()->keyBy('id');
        $state_count = 0;
        $hot_places = collect($properties)->map(function($q)use($states){
             $q->state_name = $states[$q->state]['state_name'];
             $q->state_image = $states[$q->state]['state_imag'];
            return $q;
        })->groupBy('state');

        $testimonials = Testimonial::latest()->get();

        $blog_posts = BlogPost::latest()->limit(3)->get();

        return view('frontend.index',compact('property_type','feature_properties','agents','hot_properties','hot_places','states','p_type','testimonials','blog_posts'));
       
    } // end of index

    public function UserProfile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.dashboard.edit_profile',compact('userData'));
        
    } // end of UserProfile

    public function UserProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $profileData['username'] = $request->username;
        $profileData['name'] = $request->name;
        $profileData['email'] = $request->email;
        $profileData['phone'] = $request->phone;
        $profileData['address'] = $request->address;
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$profileData['photo']));
            $fileName = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$fileName);
            $profileData['photo'] = $fileName;
        }
        $profileData->save();
        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User logout Successfully!!',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // end UserLogout

    public function ChangeUserPassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.change_password',compact('profileData'));
    } // end ChangeUserPassword

    public function UpdateUserPassword(Request $request){

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match Old Password
        if(!Hash::check($request->old_password, Auth::user()->password)){

            $notification = array(
                'message' => 'Old Password Does not Match!!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password changed successfully!!',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    } // end UpdateUserPassword

    public function UserScheduleRequest(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        $schedule_request = Schedule::where('user_id',$id)->get();
        return view('frontend.message.schedule_request',compact('userData','schedule_request'));

    } // end UpdateUserPassword
}
