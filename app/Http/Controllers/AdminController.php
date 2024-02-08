<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


    public function UpdateAdminPassword(Request $request){

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

    } // end UpdateAdminPassword

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin logout Successfully!!',
            'alert-type' => 'success'
        );
        return redirect('/admin/login')->with($notification);
    } // end AdminLogout

    // Agent related code
    public function AllAgent(){
        $all_agent = User::where('role','agent')->get();
        return view('backend.agent.all_agent',compact('all_agent'));
    } // end of AllAgent

    public function AddAgent(){
        return view('backend.agent.add_gent');
    } // end of AddAgent

    public function StoreAgent(Request $request){
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'role' => 'agent',
                'status' => 'active',
            ]);
            DB::commit();
            $notification = array(
                'message' => 'Agent Created Successfully!!',
                'alert-type' => 'success'
            );
            return redirect()->route('all.agent')->with($notification);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            DB::rollback();
            $notification = array(
                'message' => $message,
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
            // something went wrong
        }
    } // end of StoreAgent

    public function EditAgent($id){
        $agent = User::findOrFail($id);
        return view('backend.agent.edit_gent',compact('agent'));
    } // end of AddAgent

    public function UpdateAgent(Request $request){
        $agent_id = $request->id;
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            User::findOrFail($agent_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            DB::commit();
            $notification = array(
                'message' => 'Agent Created Successfully!!',
                'alert-type' => 'success'
            );
            return redirect()->route('all.agent')->with($notification);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            DB::rollback();
            $notification = array(
                'message' => $message,
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
            // something went wrong
        }
    } // end of UpdateAgent
    public function DeleteAgent($id){
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            $user_info = User::findOrFail($id);
            if($user_info->photo != NULL){
                @unlink(public_path('upload/agent_images/'.$user_info->photo));
            }
            $user_info->delete();
            DB::commit();
            $notification = array(
                'message' => 'Agent Deleted Successfully!!',
                'alert-type' => 'success'
            );
            return redirect()->route('all.agent')->with($notification);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            DB::rollback();
            $notification = array(
                'message' => $message,
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
            // something went wrong
        }
    } // end of DeleteAgent

    public function ChangeStatus(Request $request){

        $user = User::find($request->user_id);
        if($user->status == 'active'){
            $user->status = 'inactive';
        }else{
            $user->status = 'active';
        }

        $user->save();

        return response()->json(['success'=>'Status Changed successfully']);
        
    } // end of ChangeStatus 

    public function allAdminUser(){
        $admins = User::where('role','admin')->get();
        return view('backend.pages.admin.all_admin',compact('admins'));
    } // end of allAdminUser

}
