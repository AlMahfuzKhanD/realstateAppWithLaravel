<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    public function AllPermission(){
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permissions'));
    } // end method

    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    } // end method

    public function StorePermission(Request $request){

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );

        DB::beginTransaction();
        try {

            
                Permission::create([
                    'name' => $request->name,
                    'group_name' => $request->group_name

                ]);
            

            $notification = array(
                'message' => 'Permission Created successfully!!',
                'alert-type' => 'success'
            );

            DB::commit();
            return redirect()->route('all.permission')->with($notification);

        } catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } // end method

    public function EditPermission($id){

        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    } // end method 

    public function UpdatePermission(Request $request){

        $permission_id = $request->permission_id;

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );

        DB::beginTransaction();
        try {

            
                Permission::findOrFail($permission_id)->update([
                    'name' => $request->name,
                    'group_name' => $request->group_name

                ]);
            

            $notification = array(
                'message' => 'Permission Updated successfully!!',
                'alert-type' => 'success'
            );

            DB::commit();
            return redirect()->route('all.permission')->with($notification);

        } catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } // end method 

    public function DeletePermission($id){
        
        Permission::findOrFail($id)->delete();


        $notification = array(
            'message' => 'State Deleted successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->back()->with($notification);

    } //e

    public function ImportPermission(){
        
        return view('backend.pages.permission.import_permission');

    } //end of ImportPermission


}
