<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    } // End of AdminDashboard

    public function AdminLogin(){
        return view('admin.admin_login');
    } // end AdminLogin

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    } // end AdminProfile

    public function AdminProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $profileData['username'] = $request->username;
        $profileData['name'] = $request->name;
        $profileData['email'] = $request->email;
        $profileData['phone'] = $request->phone;
        $profileData['address'] = $request->address;
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$profileData['photo']));
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

    } // end AdminProfileUpdate

    public function ChangeAdminPassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.change_admin_password',compact('profileData'));
    } // end ChangeAdminPassword

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // end AdminLogout
}
