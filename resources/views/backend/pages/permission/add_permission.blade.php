@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Permission</h6>

                        <form id="myForm" method="post" action="{{ route('store.permission') }}" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="group_name" class="form-label">Group Name</label>
                                <select class="form-select" name="group_name" required>
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="type">Property Type</option>
                                    <option value="state">State</option>
                                    <option value="aminities">Aminities</option>
                                    <option value="property">Property</option>
                                    <option value="history">Package History</option>
                                    <option value="message">Property Message</option>
                                    <option value="testimonials">Testimonials</option>
                                    <option value="agent">Manage Agent</option>
                                    <option value="category">Blog Category</option>
                                    <option value="post">Blog Post</option>
                                    <option value="comment">Blog Comment</option>
                                    <option value="smtp">SMTP Setting</option>
                                    <option value="site">Site Setting</option>
                                    <option value="role">Role Permission</option>
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
