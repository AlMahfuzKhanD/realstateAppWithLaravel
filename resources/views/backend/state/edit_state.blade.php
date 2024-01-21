@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit State</h6>

                        <form method="post" action="{{ route('update.state') }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="state_id" value="{{ $state->id }}"/>
                            <input type="hidden" name="old_state_image" value="{{ $state->state_imag }}">
                            <div class="mb-3">
                                <label for="state_name" class="form-label">State Name</label>
                                <input type="text" class="form-control @error('state_name') is-invalid @enderror" id="state_name" name="state_name" value="{{ $state->state_name??'' }}" autocomplete="off"/>
                                @error('state_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">State Image</label>
                                        <input  type="file" class="form-control" name="state_image" onChange="stateUrl(this)" required>
                                        <img src="" alt="" id="stateImage" style="margin-top: 10px;">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <img src="{{ asset($state->state_imag) }}" alt="no image" style="width: 100px; height:100px;">
                                    </div>
                                </div><!-- Col -->
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
   
    
    function stateUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#stateImage').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
