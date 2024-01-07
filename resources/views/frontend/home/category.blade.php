<section class="category-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <ul class="category-list clearfix">
                @foreach ($property_type as $ptype )
                <li>
                    <div class="category-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="{{ $ptype->type_icon??''  }}"></i></div>
                            <h5><a href="property-details.html">{{ $ptype->type_name??'' }}</a></h5>
                            <span>52</span>
                        </div>
                    </div>
                </li> 
                @endforeach
                
                
            </ul>
            <div class="more-btn"><a href="categories.html" class="theme-btn btn-one">All Categories</a></div>
        </div>
    </div>
</section>