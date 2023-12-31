@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Agent</h6>

                        <form id="myForm" method="post" action="{{ route('update.agent') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" id="" value="{{ $agent->id }}">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Agent Name</label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ $agent->name??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Agent Email</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="{{ $agent->email??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Agent Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" value="{{ $agent->phone??'' }}"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Agent Address</label>
                                <input type="text" class="form-control" id="address" name="address" autocomplete="off" value="{{ $agent->address??'' }}"/>
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
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                email: {
                    required : true,
                }, 
                password: {
                    required : true,
                }, 
                
            },
            messages :{
                name: {
                    required : 'Please Enter Agent Name',
                }, 
                email: {
                    required : 'Please Enter Agent Email',
                }, 
                password: {
                    required : 'Please Enter Agent Password',
                }, 
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
@endsection
