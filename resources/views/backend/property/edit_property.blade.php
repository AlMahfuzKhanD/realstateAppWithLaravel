@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Property</h6>
                            <form method="post" action="{{ route('store.property') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Name</label>
                                            <input type="text" class="form-control" name="property_name" value="{{ $property->property_name }}" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Status</label>
                                            <select class="form-select" name="property_status" required>
                                                <option selected="" disabled="">Select Status</option>
                                                <option value="rent" {{ $property->property_status == 'rent' ? 'selected' : ''}}>For Rent</option>
                                                <option value="buy" {{ $property->property_status == 'buy' ? 'selected' : ''}}>For Buy</option>
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Lowest Price</label>
                                            <input type="text" class="form-control" name="lowest_price" value="{{ $property->lowest_price }}" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Maximum Price</label>
                                            <input type="text" class="form-control" name="maximum_price" value="{{ $property->maximum_price }}" required>
                                        </div>
                                    </div><!-- Col -->

                                    

                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bed Rooms</label>
                                            <input type="text" class="form-control" name="bedrooms" value="{{ $property->bedrooms }}" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms" value="{{ $property->bathrooms }}" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage</label>
                                            <input type="text" class="form-control" name="garage" value="{{ $property->garage }}" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage Size</label>
                                            <input type="text" class="form-control" name="garage_size" value="{{ $property->garage_size }}" required>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ $property->address }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $property->city }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" value="{{ $property->state }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" name="postal_code" value="{{ $property->postal_code }}">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Size</label>
                                            <input type="text" class="form-control" name="property_size" value="{{ $property->property_size }}" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Video</label>
                                            <input type="text" class="form-control" name="property_video" value="{{ $property->property_video }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood" value="{{ $property->neighborhood }}" >
                                        </div>
                                    </div><!-- Col -->
                                    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Latitude</label>
                                            <input type="text" class="form-control" name="latitude" value="{{ $property->latitude }}" required>
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Click to find latitude and logitude</a>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Longitude</label>
                                            <input type="text" class="form-control" name="longitude" value="{{ $property->longitude }}" required>
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Click to find latitude and logitude</a>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Type</label>
                                            <select class="form-select" name="ptype_id"  required>
                                                <option selected="" disabled="">Select Property Type</option>
                                                @foreach ($propertyType as $ptype)
                                                <option value="{{ $ptype->id }}" {{ $ptype->id == $property->ptype_id ? 'selected' : ''}}>{{ $ptype->type_name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Amenities</label>
                                            <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%" name="amenities_id[]" required>
                                                @foreach ($amenities as $amenity)
                                                <option value="{{ $amenity->id }}" {{ (in_array($amenity->id,$property_aminity)) ? 'selected' : '' }}>{{ $amenity->amenities_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Agent</label>
                                            <select class="form-select" name="agent_id"  >
                                                <option selected="" disabled="">Select Status</option>
                                                @foreach ($activeAgent as $agent)
                                                <option value="{{ $agent->id }}" {{ $agent->id == $property->agent_id ? 'selected' : ''}}>{{ $agent->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Short Desc</label>
                                            <textarea type="text" class="form-control" name="short_desc" rows="2"  required>{{ $property->short_desc }}</textarea>
                                        </div>
                                    </div><!-- Col -->    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Long Desc</label>
                                            <textarea class="form-control" name="long_desc" id="tinymceExample" rows="10"> {!! $property->long_desc !!}</textarea>
                                        </div>
                                    </div><!-- Col -->    
                                </div><!-- Row -->
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="checkInline" name="featured" value="1" {{ $property->featured == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="checkInline">
                                            Featured Property
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="checkInlineChecked" name="hot" value="1" {{ $property->hot == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="checkInlineChecked">
                                            Hot Property
                                        </label>
                                    </div>
                                </div>

                             <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                            
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->

    </div>
</div>
 <!--========== Start of add multiple class with ajax ==============-->

 <!--========== End of add multiple class with ajax ==============-->
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
