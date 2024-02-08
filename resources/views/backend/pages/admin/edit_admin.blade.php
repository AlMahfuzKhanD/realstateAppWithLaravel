@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Admin</h6>

                        <form id="myForm" method="post" action="{{ route('update.admin.user',$user->id) }}" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="user_name" class="form-label">Admin User Name</label>
                                <input type="text" class="form-control" id="user_name" name="username" autocomplete="off" value="{{ $user->username }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ $user->name }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Admin Email</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="{{ $user->email }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Admin Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" value="{{ $user->phone }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Admin Address</label>
                                <input type="text" class="form-control" id="address" name="address" autocomplete="off" value="{{ $user->address }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="roles" class="form-label">Admin Role</label>
                                <select class="form-select" name="roles" required>
                                    <option selected="" disabled="">Select Group</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}" {{ $user->hasRole($item->name) ? 'selected' :'' }}>{{ $item->name??'' }}</option>
                                    @endforeach
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
