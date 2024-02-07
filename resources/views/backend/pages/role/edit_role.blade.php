@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Role</h6>

                        <form id="myForm" method="post" action="{{ route('update.role') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="role_id" value="{{ $role->id }}">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Role Name</label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ $role->name??'' }}"/>
                            </div>
                            
                            
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

@endsection
