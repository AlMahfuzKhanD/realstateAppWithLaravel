<section class="place-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Top Places</h5>
            <h2>Most Popular Places</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />
                labore dolore magna aliqua enim.
            </p>
        </div>
        <div class="sortable-masonry">
            <div class="items-container row clearfix">
                @foreach ($hot_places as $state) 
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{ asset($state[0]['state_image']) }}" alt="" style="width:370px;height:275px;"/></figure>
                                <div class="text">
                                    <h4><a href="categories.html">{{ $state[0]['state_name']??'' }}</a></h4>
                                    <p>{{ count($state) }} Properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>