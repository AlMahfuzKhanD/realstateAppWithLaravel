<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $property_type = PropertyType::latest()->limit(5)->get();
        return view('frontend.index',compact('property_type'));
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
}
