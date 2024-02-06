@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Permission</h6>

                        <form id="myForm" method="post" action="{{ route('update.permission') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="permission_id" value="{{ $permission->id }}">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ $permission->name??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="group_name" class="form-label">Group Name</label>
                                <select class="form-select" name="group_name" required>
                                    <option selected="" disabled="">Select Group</option>
                                    <option {{ $permission->group_name == 'type' ? 'selected' : '' }} value="type">Property Type</option>
                                    <option {{ $permission->group_name == 'state' ? 'selected' : '' }} value="state">State</option>
                                    <option {{ $permission->group_name == 'aminities' ? 'selected' : '' }} value="aminities">Aminities</option>
                                    <option {{ $permission->group_name == 'property' ? 'selected' : '' }} value="property">Property</option>
                                    <option {{ $permission->group_name == 'history' ? 'selected' : '' }} value="history">Package History</option>
                                    <option {{ $permission->group_name == 'message' ? 'selected' : '' }} value="message">Property Message</option>
                                    <option {{ $permission->group_name == 'testimonials' ? 'selected' : '' }} value="testimonials">Testimonials</option>
                                    <option {{ $permission->group_name == 'agent' ? 'selected' : '' }} value="agent">Manage Agent</option>
                                    <option {{ $permission->group_name == 'category' ? 'selected' : '' }} value="category">Blog Category</option>
                                    <option {{ $permission->group_name == 'post' ? 'selected' : '' }} value="post">Blog Post</option>
                                    <option {{ $permission->group_name == 'comment' ? 'selected' : '' }} value="comment">Blog Comment</option>
                                    <option {{ $permission->group_name == 'smtp' ? 'selected' : '' }} value="smtp">SMTP Setting</option>
                                    <option {{ $permission->group_name == 'site' ? 'selected' : '' }} value="site">Site Setting</option>
                                    <option {{ $permission->group_name == 'role' ? 'selected' : '' }} value="role">Role Permission</option>
                                </select>
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
