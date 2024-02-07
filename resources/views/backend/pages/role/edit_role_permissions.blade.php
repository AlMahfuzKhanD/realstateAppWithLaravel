@extends('admin.admin_dashboard') @section('admin')
<style>
    .form-check-label{
        text-transform: capitalize;
    }
</style>
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Assigned Permission</h6>

                        <form id="myForm" method="post" action="{{ route('update.role.permission',$role->id) }}" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                               <h3>{{ $role->name??'' }}</h3>
                               
                            </div>
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="all_permission_check">
                                <label class="form-check-label" for="all_permission_check">
                                    All Permission
                                </label>
                            </div>

                            <hr>
                            @foreach ($permissionGroups as $group)
                            <div class="row">
                                <div class="col-3">
                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                    @endphp
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="checkDefault" {{ App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkDefault">
                                            {{ $group->group_name??'' }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-9">
                                    
                                    @foreach ($permissions as $permission)
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="checkDefault_{{ $permission->id??'' }}" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkDefault_{{ $permission->id??'' }}">
                                            {{ $permission->name??'' }}
                                        </label>
                                    </div>
                                    @endforeach
                                    <br>
                                </div>
                            </div>
                            @endforeach

    
                            
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->

        <!-- right wrapper end -->
    </div>
</div>
<script>
    $('#all_permission_check').click(function(){
        if($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true);
        }else{
            $('input[type=checkbox]').prop('checked',false);
        }
    });
</script>
@endsection
