@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Post</h6>

                        <form method="post" action="{{ route('update.post') }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="state_id" value="{{ $post->id }}"/>
                            <input type="hidden" name="old_post_image" value="{{ $post->post_image }}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Post Title</label>
                                        <input type="text" class="form-control" name="post_title" required value="{{ $post->post_image }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Blog Category</label>
                                        <select class="form-select" name="blog_cat_id" required>
                                            <option selected="" disabled="">Select Category</option>
                                            @foreach ($blog_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name??'' }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div><!-- Col -->

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>
                                        <textarea type="text" class="form-control" name="short_description" rows="2" >{{ $post->short_description }}</textarea>
                                    </div>
                                </div><!-- Col -->    
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Long Description</label>
                                        <textarea class="form-control" name="long_description" id="tinymceExample" rows="10">{{ $post->long_description }}</textarea>
                                    </div>
                                </div><!-- Col -->    
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Post Tags</label>
                                        <input name="post_tags" id="tags" value="{{ $post->post_tags }}" />
                                    </div>
                                </div><!-- Col -->    
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Post Image</label>
                                <input type="file" class="form-control" name="post_image" onChange="postUrl(this)" required>
                                <br>
                                <img src="" alt="" id="postImage">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <img src="{{ asset($post->post_image) }}" alt="no image" style="width: 100px; height:100px;">
                                </div>
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
   
    
    function postUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#postImage').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
