@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Amenitie</h6>

                        <form id="myForm" method="post" action="{{ route('update.amenitie') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="amenitie_id" value="{{ $amenitie->id }}"/>
                            <div class="form-group mb-3">
                                <label for="amenities_name" class="form-label">Amenitie Name</label>
                                <input type="text" class="form-control" id="amenities_name" name="amenities_name" value="{{ $amenitie->amenities_name }}" autocomplete="off"/>
                            </div>
                            
                            <button type="submit" class="btn btn-primary me-2">Update Changes</button>
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
                amenities_name: {
                    required : true,
                }, 
                
            },
            messages :{
                amenities_name: {
                    required : 'Please Enter Amenities Name',
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
