<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

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


    public function export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    } //end of ImportPermission

    public function import(Request $request){

        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Imported successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end of import

    public function allRoles(){

        $roles = Role::all();
        return view('backend.pages.role.all_role',compact('roles'));

    } //end of import

    
    public function addRole(){
        return view('backend.pages.role.add_role');
    } // end method

    public function storeRole(Request $request){

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );

        DB::beginTransaction();
        try {

            
                Role::create([
                    'name' => $request->name,

                ]);
            

            $notification = array(
                'message' => 'Role Created successfully!!',
                'alert-type' => 'success'
            );

            DB::commit();
            return redirect()->route('all.roles')->with($notification);

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

    public function editRole($id){

        $role = Role::findOrFail($id);
        return view('backend.pages.role.edit_role',compact('role'));
    } // end method 

    public function updateRole(Request $request){

        $role_id = $request->role_id;

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );

        DB::beginTransaction();
        try {

            
                Role::findOrFail($role_id)->update([
                    'name' => $request->name

                ]);
            

            $notification = array(
                'message' => 'Role Updated successfully!!',
                'alert-type' => 'success'
            );

            DB::commit();
            return redirect()->route('all.roles')->with($notification);

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

    public function deleteRole($id){
        
        Role::findOrFail($id)->delete();


        $notification = array(
            'message' => 'State Deleted successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->back()->with($notification);

    } //end of method

    public function assignPermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();
        return view('backend.pages.role.assign_permissions',compact('roles','permissions','permissionGroups'));
    } // end method 

    public function storeAssignPermission(Request $request){

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );

        DB::beginTransaction();
        try {

            $data = array();
            $permissions = $request->permissions;
            foreach($permissions as $key => $item){
                $data['role_id'] = $request->role_id;
                $data['permission_id'] = $item;

                DB::table('role_has_permissions')->insert($data);
            } //end foreach

            $notification = array(
                'message' => 'Permission Assigned successfully!!',
                'alert-type' => 'success'
            );

            DB::commit();
            return redirect()->route('all.assigned.permission')->with($notification);

        } catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } // end method storeAssignPermission 

    public function allAssignedPermission(){
        $roles = Role::all();
        return view('backend.pages.role.all_assigned_permissions',compact('roles'));
    } // end method allAssignedPermission 
    

}
