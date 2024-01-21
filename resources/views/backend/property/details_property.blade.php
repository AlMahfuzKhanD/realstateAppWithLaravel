@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Property Details</h6>
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <tbody>
                                <tr>
                                    <td>Property Name</td>
                                    <td> <code>{{ $property->property_name??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Status</td>
                                    <td> <code>{{ $property->property_status??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Lowest Price</td>
                                    <td> <code>{{ $property->lowest_price??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Max Price</td>
                                    <td> <code>{{ $property->maximum_price??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Bed Rooms</td>
                                    <td> <code>{{ $property->bedrooms??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Bathrooms</td>
                                    <td> <code>{{ $property->bathrooms??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Garage</td>
                                    <td> <code>{{ $property->garage??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Garage Size</td>
                                    <td> <code>{{ $property->garage_size??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td> <code>{{ $property->address??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td> <code>{{ $property->city??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td> <code>{{ $property['pstate']['state_name']??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Postal Code</td>
                                    <td> <code>{{ $property->postal_code??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Main Image</td>
                                    <td> <img src="{{ asset($property->property_thumbnail) }}" alt="" style="width:100px; height:70px;"></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>@if ($property->status==1)
                                        <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">In Active</span>
                                        @endif
                                    </td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Hoverable Table</h6>
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <tbody>
                                <tr>
                                    <td>Property Code</td>
                                    <td> <code>{{ $property->property_code??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Size</td>
                                    <td> <code>{{ $property->property_size??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Vidio</td>
                                    <td> <code>{{ $property->property_video??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Neihborhood</td>
                                    <td> <code>{{ $property->neighborhood??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Latitude</td>
                                    <td> <code>{{ $property->latitude??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Longitude</td>
                                    <td> <code>{{ $property->longitude??'' }}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Type</td>
                                    <td> <code>{{ $property['type']['type_name']??'' }}</code></td>
                                </tr>
                                
                                <tr>
                                    <td>Property Aminities</td>
                                    <td> <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%" name="amenities_id[]" required>
                                        @foreach ($amenities as $amenity)
                                        <option value="{{ $amenity->id }}" {{ (in_array($amenity->id,$property_aminity)) ? 'selected' : '' }}>{{ $amenity->amenities_name }}</option>
                                        @endforeach
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Agent</td>
                                    @if ($property->agent_id == NULL)
                                        <td> <code>Admin</code> </td>
                                    @else
                                    <td> <code>{{ $property['user']['name'] }}</code></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Short Desc</td>
                                    
                                    <td> <code>{{ $truncated = Str::of($property->short_desc)->limit(20); }}</code></td>
                                    
                                </tr>
                                <tr>
                                    <td>Long Desc</td>
                                    
                                    <td> <code>{!! $truncated = Str::of($property->long_desc)->limit(20); !!}</code></td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                        <br>
                        @if ($property->status==1)
                        <form method="post" action="{{ route('inactive.property') }}">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                            <button type="submit" class="btn btn-primary">InActive</button>
                        </form>
                        @else
                        <form method="post" action="{{ route('active.property') }}">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                            <button type="submit" class="btn btn-primary">Active</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
