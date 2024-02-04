@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update Site Setting</h6>

                        <form id="myForm" method="post" action="{{ route('update.site.setting') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="form-group mb-3">
                                <label for="support_phone" class="form-label">Support Phone</label>
                                <input type="text" class="form-control" id="support_phone" name="support_phone" value="{{ $data->support_phone??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="company_address" class="form-label">Company_address</label>
                                <input type="text" class="form-control" id="company_address" name="company_address" value="{{ $data->company_address??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="facebook" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $data->facebook??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $data->twitter??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="copyright" class="form-label">Copyright</label>
                                <input type="text" class="form-control" id="copyright" name="copyright" value="{{ $data->copyright??'' }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="userPhoto" class="form-label">Logo</label>
                                <input class="form-control" type="file" id="userPhoto" name="logo">
                            </div>
                            <div class="mb-3">
                                <label for="showImage" class="form-label"></label>
                                <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($data->logo)) ? asset($data->logo) : url('upload/no_image.jpg') }}" alt="no image" />
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
<script type="text/javascript">

    $(document).ready(function(){
    
        $('#userPhoto').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    
    });
    
    </script>
@endsection
