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
            return redirect()->back()->with($notification);

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
}
