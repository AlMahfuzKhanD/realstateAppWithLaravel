@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Testimonial</h6>

                        <form method="post" action="{{ route('update.testimonial') }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="testimonial_id" value="{{ $testimonial->id }}"/>
                            <input type="hidden" name="old_testimonial_image" value="{{ $testimonial->image }}">
                            <div class="mb-3">
                                <label for="testimonial_name" class="form-label">Testimonial Name</label>
                                <input type="text" class="form-control @error('testimonial_name') is-invalid @enderror" id="testimonial_name" name="name" value="{{ $testimonial->name??'' }}" autocomplete="off"/>
                                @error('testimonial_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="testimonial_position" class="form-label">Testimonial Position</label>
                                <input type="text" class="form-control @error('testimonial_position') is-invalid @enderror" id="testimonial_position" name="position" value="{{ $testimonial->position??'' }}" autocomplete="off"/>
                                @error('testimonial_position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="testimonial_message" class="form-label">Message</label>
                                <textarea type="text" class="form-control" name="message" rows="3"  required>{{ $testimonial->message??'' }}</textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Testimonial Image</label>
                                        <input  type="file" class="form-control" name="image" onChange="testimonialUrl(this)" required>
                                        <img src="" alt="" id="testimonialImage" style="margin-top: 10px;">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <img src="{{ asset($testimonial->image) }}" alt="no image" style="width: 100px; height:100px;">
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
   
    
    function testimonialUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#testimonialImage').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
