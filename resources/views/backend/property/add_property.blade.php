@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Property</h6>
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Name</label>
                                            <input type="text" class="form-control" name="property_name">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Status</label>
                                            <select class="form-select" name="property_status" >
                                                <option selected="" disabled="">Select Status</option>
                                                <option value="rent">For Rent</option>
                                                <option value="buy">For Buy</option>
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Lowest Price</label>
                                            <input type="text" class="form-control" name="property_name">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Maximum Price</label>
                                            <input type="text" class="form-control" name="property_name">
                                        </div>
                                    </div><!-- Col -->

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Main Thumbnail</label>
                                            <input type="file" class="form-control" name="property_thumbnail" onChange="mainThumUrl(this)">
                                            <img src="" alt="" id="mainThumb">
                                        </div>
                                    </div><!-- Col -->

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Multiple Image</label>
                                            <input type="file" class="form-control" name="multi_img[]" id="multiImg" multiple="">
                                            <div class="row" id="preview_img"> </div>
                                        </div>
                                    </div><!-- Col -->

                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bed Rooms</label>
                                            <input type="text" class="form-control" name="bedrooms">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage</label>
                                            <input type="text" class="form-control" name="garage">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage Size</label>
                                            <input type="text" class="form-control" name="garage_size">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" name="postal_code">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Size</label>
                                            <input type="text" class="form-control" name="property_size">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Video</label>
                                            <input type="text" class="form-control" name="property_video">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood">
                                        </div>
                                    </div><!-- Col -->
                                    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Latitude</label>
                                            <input type="text" class="form-control" name="latitude">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Click to find latitude and logitude</a>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Longitude</label>
                                            <input type="text" class="form-control" name="longitude">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Click to find latitude and logitude</a>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Type</label>
                                            <select class="form-select" name="ptype_id" >
                                                <option selected="" disabled="">Select Property Type</option>
                                                @foreach ($propertyType as $ptype)
                                                <option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Amenities</label>
                                            <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%" name="amenities_id[]">
                                                @foreach ($amenities as $amenity)
                                                <option value="{{ $amenity->id }}">{{ $amenity->amenities_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Agent</label>
                                            <select class="form-select" name="agent_id" >
                                                <option selected="" disabled="">Select Status</option>
                                                @foreach ($activeAgent as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Short Desc</label>
                                            <textarea type="text" class="form-control" name="bedrooms" rows="2"></textarea>
                                        </div>
                                    </div><!-- Col -->    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Long Desc</label>
                                            <textarea class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
                                        </div>
                                    </div><!-- Col -->    
                                </div><!-- Row -->
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="checkInline" name="featured" value="1">
                                        <label class="form-check-label" for="checkInline">
                                            Featured Property
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="checkInlineChecked" name="hot" value="1">
                                        <label class="form-check-label" for="checkInlineChecked">
                                            Hot Property
                                        </label>
                                    </div>
                                    
                                    
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary submit">Submit form</button>
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
    
    function mainThumUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script> 
 // Multi Image show
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
     
    </script>
@endsection
