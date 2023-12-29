@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Property</h6>
                            <form method="post" action="{{ route('update.property') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $property->id }}">
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
 <!--========== Thumbnail Image Update ==============-->
 <div class="page-content" style="margin-top: -40px; ">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Main Thumbnail Image</h6>
                            <form method="post" action="{{ route('update.property.thumbnail') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $property->id }}">
                                <input type="hidden" name="old_image" value="{{ $property->property_thumbnail }}">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Main Thumbnail</label>
                                            <input type="file" class="form-control" name="property_thumbnail" onChange="mainThumUrl(this)" required>
                                            <img src="" alt="" id="mainThumb" style="margin-top: 10px;">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"></label>
                                            <img src="{{ asset($property->property_thumbnail) }}" alt="no image" style="width: 100px; height:100px;">
                                        </div>
                                    </div><!-- Col -->
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--========== End Thumbnail Image Update ==============-->

  <!--========== Property Multi Image Update ==============-->
  <div class="page-content" style="margin-top: -40px; ">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Multi Image</h6>
                            <form method="post" action="{{ route('update.property.multiimage') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>SL</th>
												<th>Image</th>
												<th>Change Image</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($multi_image as $key => $img)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
												<td class="py-1">
													<img src="{{ asset($img->photo_name) }}" alt="image" style="width:50px;height:50px;">
												</td>
												<td><input type="file" class="form-control" name="multi_img[{{ $img->id }}]"></td>
												<td>
                                                    <input type="submit" class="btn btn-primary px-4" value="Update Image">
                                                    <a href="{{ route('delete.property.multiimage',$img->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                                </td>
											</tr>
                                            @endforeach
											
											
										</tbody>
									</table>
								</div>
                            </form>
                            <form method="post" action="{{ route('store.new.multiimage') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td><input type="file" class="form-control" name="multi_img_add_in_edit[]" multiple></td>
                                            <td><input type="submit" class="btn btn-info" value="Add Image"></td>
                                        </tr>
                                    </tbody> 
                                </table>    
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--========== End Property Multi Image Update ==============-->
  <!--========== Facility Update ==============-->
  <div class="page-content" style="margin-top: -40px; ">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Property Facilities</h6>
                            <form method="post" action="{{ route('update.property.facility') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                @foreach ($facilities as $facility)
                                <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                                          
                                    <div class="row" style="margin-top: 10px !important;">
                        
                                       <div class="form-group col-md-4">
                                          <label for="facility_name">Facilities</label>
                                          <select name="facility_name[]" id="facility_name" class="form-control">
                                                <option value="">Select Facility</option>
                                                <option value="Hospital" {{ $facility->facility_name == 'Hospital' ? 'selected' : ''}}>Hospital</option>
                                                <option value="SuperMarket" {{ $facility->facility_name == 'SuperMarket' ? 'selected' : ''}}>Super Market</option>
                                                <option value="School" {{ $facility->facility_name == 'School' ? 'selected' : ''}}>School</option>
                                                <option value="Entertainment" {{ $facility->facility_name == 'Entertainment' ? 'selected' : ''}}>Entertainment</option>
                                                <option value="Pharmacy" {{ $facility->facility_name == 'Pharmacy' ? 'selected' : ''}}>Pharmacy</option>
                                                 <option value="Airport" {{ $facility->facility_name == 'Airport' ? 'selected' : ''}}>Airport</option>
                                                <option value="Railways" {{ $facility->facility_name == 'Railways' ? 'selected' : ''}}>Railways</option>
                                                <option value="Bus Stop" {{ $facility->facility_name == 'Bus Stop' ? 'selected' : ''}}>Bus Stop</option>
                                                <option value="Beach" {{ $facility->facility_name == 'Beach' ? 'selected' : ''}}>Beach</option>
                                                <option value="Mall" {{ $facility->facility_name == 'Mall' ? 'selected' : ''}}>Mall</option>
                                                <option value="Bank" {{ $facility->facility_name == 'Bank' ? 'selected' : ''}}>Bank</option>
                                          </select>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="distance">Distance</label>
                                          <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)" value="{{ $facility->distance??'' }}">
                                       </div>
                                       <div class="form-group col-md-4" style="padding-top: 20px">
                                          <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                                          <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
                                       </div>
                                    </div>
                                 
                              </div> 
                                @endforeach
                                
                               
                            <button type="submit" class="btn btn-primary">Save Changes</button> <!---end row-->
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--========== End Facility Update ==============-->
<!--========== Start of add multiple class with ajax ==============-->

 <script type="text/javascript">
    $(document).ready(function(){
       var counter = 0;
       $(document).on("click",".addeventmore",function(){
             var whole_extra_item_add = $("#whole_extra_item_add").html();
             $(this).closest(".add_item").append(whole_extra_item_add);
             counter++;
       });
       $(document).on("click",".removeeventmore",function(event){
             $(this).closest("#whole_extra_item_delete").remove();
             counter -= 1
       });
    });
 </script>
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
