<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Features</h5>
            <h2>Featured Property</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />
                labore dolore magna aliqua enim.
            </p>
        </div>
        <div class="row clearfix">
            @foreach ($feature_properties as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset($item->property_thumbnail) }}" alt="" /></figure>
                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">Featured</span>
                            </div>
                            <div class="lower-content">
                                <div class="author-info clearfix">
                                    <div class="author pull-left">
                                        @if ($item->agent_id == NULL)
                                        <figure class="author-thumb"><img src="{{ url('upload/no_image.jpg') }}" alt="" /></figure>
                                        <h6>Admin</h6>
                                        @else   
                                        <figure class="author-thumb"><img src="{{ (!empty($item->user->photo)) ? url('upload/agent_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt="" /></figure>
                                        <h6>{{ $item->user->name??'' }}</h6>
                                        @endif
                                        
                                    </div>
                                    <div class="buy-btn pull-right"><a href="{{ $item->property_status == 'rent' ?  route('rent.property') : route('buy.property')  }}">For {{ $item->property_status??'' }}</a></div>
                                </div>
                                <div class="title-text">
                                    <h4><a href="{{ url('property/details/'.$item->id.'/'.$item->property_slug) }}">{{ $item->property_name??'' }}</a></h4>
                                </div>
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>Start From</h6>
                                        <h4>${{ $item->lowest_price??0 }}.00</h4>
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li>
                                            <a aria-label="Compare" class="action-btn" id="{{ $item->id }}" onclick="addToCompare(this.id)"><i class="icon-12"></i></a>
                                        </li>
                                        <li>
                                            <a aria-label="Add to wish list" class="action-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)"><i class="icon-13"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <p>{{ $item->short_desc??'' }}</p>
                                <ul class="more-details clearfix">
                                    <li><i class="icon-14"></i>{{ $item->bedrooms??0 }} Beds</li>
                                    <li><i class="icon-15"></i>{{ $item->bathrooms??0 }} Baths</li>
                                    <li><i class="icon-16"></i>{{ $item->property_size??0 }} Sq Ft</li>
                                </ul>
                                <div class="btn-box"><a href="{{ url('property/details/'.$item->id.'/'.$item->property_slug) }}" class="theme-btn btn-two">See Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="more-btn centred"><a href="property-list.html" class="theme-btn btn-one">View All Listing</a></div>
    </div>
</section>