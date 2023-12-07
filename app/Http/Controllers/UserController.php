<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('frontend.index');
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

        return redirect('/login');
    } // end AdminLogout
}
