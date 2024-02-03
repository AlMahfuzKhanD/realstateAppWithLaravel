@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update Smtp Setting</h6>

                        <form id="myForm" method="post" action="{{ route('update.smtp.setting') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $smtpData->id }}">
                            <div class="form-group mb-3">
                                <label for="mailer" class="form-label">Mailer</label>
                                <input type="text" class="form-control" id="mailer" name="mailer" value="{{ $smtpData->mailer??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="host" class="form-label">Host</label>
                                <input type="text" class="form-control" id="host" name="host" value="{{ $smtpData->host??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="port" class="form-label">Port</label>
                                <input type="text" class="form-control" id="port" name="port" value="{{ $smtpData->port??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_name" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $smtpData->user_name??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="{{ $smtpData->password??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="encryption" class="form-label">Encryption</label>
                                <input type="text" class="form-control" id="encryption" name="encryption" value="{{ $smtpData->encryption??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="from_address" class="form-label">From Address</label>
                                <input type="text" class="form-control" id="from_address" name="from_address" value="{{ $smtpData->from_address??'' }}"/>
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
