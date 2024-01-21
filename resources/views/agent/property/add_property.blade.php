@extends('agent.agent_dashboard') @section('agent')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Agent Property</h6>
                            <form method="post" action="{{ route('store.agent.property') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Name</label>
                                            <input type="text" class="form-control" name="property_name" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Status</label>
                                            <select class="form-select" name="property_status" required>
                                                <option selected="" disabled="">Select Status</option>
                                                <option value="rent">For Rent</option>
                                                <option value="buy">For Buy</option>
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Lowest Price</label>
                                            <input type="text" class="form-control" name="lowest_price" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Maximum Price</label>
                                            <input type="text" class="form-control" name="maximum_price" required>
                                        </div>
                                    </div><!-- Col -->

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Main Thumbnail</label>
                                            <input type="file" class="form-control" name="property_thumbnail" onChange="mainThumUrl(this)" required>
                                            <img src="" alt="" id="mainThumb">
                                        </div>
                                    </div><!-- Col -->

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Multiple Image</label>
                                            <input type="file" class="form-control" name="multi_img[]" id="multiImg" multiple="" required>
                                            <div class="row" id="preview_img"> </div>
                                        </div>
                                    </div><!-- Col -->

                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bed Rooms</label>
                                            <input type="text" class="form-control" name="bedrooms" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage</label>
                                            <input type="text" class="form-control" name="garage" required>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage Size</label>
                                            <input type="text" class="form-control" name="garage_size" required>
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
                                            <select class="form-select" name="state_id"  required>
                                                <option selected="" disabled="">Select State</option>
                                                @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                @endforeach
                                                
                                            </select>
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
                                            <input type="text" class="form-control" name="property_size" required>
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
                                            <input type="text" class="form-control" name="neighborhood" >
                                        </div>
                                    </div><!-- Col -->
                                    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Latitude</label>
                                            <input type="text" class="form-control" name="latitude" required>
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Click to find latitude and logitude</a>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Longitude</label>
                                            <input type="text" class="form-control" name="longitude" required>
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Click to find latitude and logitude</a>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Type</label>
                                            <select class="form-select" name="ptype_id"  required>
                                                <option selected="" disabled="">Select Property Type</option>
                                                @foreach ($propertyType as $ptype)
                                                <option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Amenities</label>
                                            <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%" name="amenities_id[]" required>
                                                @foreach ($amenities as $amenity)
                                                <option value="{{ $amenity->amenities_name }}">{{ $amenity->amenities_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    
                                    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Short Desc</label>
                                            <textarea type="text" class="form-control" name="short_desc" rows="2"  required></textarea>
                                        </div>
                                    </div><!-- Col -->    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Long Desc</label>
                                            <textarea class="form-control" name="long_desc" id="tinymceExample" rows="10"></textarea>
                                        </div>
                                    </div><!-- Col -->    
                                </div><!-- Row -->
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="checkInline" name="featured" value="1" >
                                        <label class="form-check-label" for="checkInline">
                                            Featured Property
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="checkInlineChecked" name="hot" value="1" >
                                        <label class="form-check-label" for="checkInlineChecked">
                                            Hot Property
                                        </label>
                                    </div>
                                </div>
                                <!---Facilities-->
                                <div class="row add_item">
                                    <div class="col-md-4">
                                          <div class="mb-3">
                                                <label for="facility_name" class="form-label">Facilities </label>
                                                <select name="facility_name[]" id="facility_name" class="form-control" required>
                                                      <option value="">Select Facility</option>
                                                      <option value="Hospital">Hospital</option>
                                                      <option value="SuperMarket">Super Market</option>
                                                      <option value="School">School</option>
                                                      <option value="Entertainment">Entertainment</option>
                                                      <option value="Pharmacy">Pharmacy</option>
                                                      <option value="Airport">Airport</option>
                                                      <option value="Railways">Railways</option>
                                                      <option value="Bus Stop">Bus Stop</option>
                                                      <option value="Beach">Beach</option>
                                                      <option value="Mall">Mall</option>
                                                      <option value="Bank">Bank</option>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                          <div class="mb-3">
                                                <label for="distance" class="form-label"> Distance </label>
                                                <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)" >
                                          </div>
                                    </div>
                                    <div class="form-group col-md-4" style="padding-top: 30px;">
                                          <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> Add More..</a>
                                    </div>
                             </div> <!---end row-->
                             <div style="visibility: hidden">
                                <div class="whole_extra_item_add" id="whole_extra_item_add">
                                   <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                                      
                                         <div class="row" style="margin-top: 10px !important;">
                             
                                            <div class="form-group col-md-4">
                                               <label for="facility_name">Facilities</label>
                                               <select name="facility_name[]" id="facility_name" class="form-control">
                                                     <option value="">Select Facility</option>
                                                     <option value="Hospital">Hospital</option>
                                                     <option value="SuperMarket">Super Market</option>
                                                     <option value="School">School</option>
                                                     <option value="Entertainment">Entertainment</option>
                                                     <option value="Pharmacy">Pharmacy</option>
                                                     <option value="Airport">Airport</option>
                                                     <option value="Railways">Railways</option>
                                                     <option value="Bus Stop">Bus Stop</option>
                                                     <option value="Beach">Beach</option>
                                                     <option value="Mall">Mall</option>
                                                     <option value="Bank">Bank</option>
                                               </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                               <label for="distance">Distance</label>
                                               <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)">
                                            </div>
                                            <div class="form-group col-md-4" style="padding-top: 20px">
                                               <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                                               <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
                                            </div>
                                         </div>
                                      
                                   </div>
                                </div>
                             </div>    
                             <button type="submit" class="btn btn-primary">Save Changes</button>
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
 <!--========== Start of add multiple class with ajax ==============-->
  
 
 
 
             <!----For Section-------->
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
