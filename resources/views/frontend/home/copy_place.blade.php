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
                @foreach ($skip_states as $state)
                    @if ($loop->first)
                        <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                            <div class="place-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ asset($state->state_imag) }}" alt="" style="width:370px;height:580px;"/></figure>
                                    <div class="text">
                                        <h4><a href="categories.html">{{ $state->state_name??'' }}</a></h4>
                                        <p>0 Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                
                    @if ($loop->remaining)
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{ asset($state->state_imag) }}" alt="" style="width:370px;height:275px;"/></figure>
                                <div class="text">
                                    <h4><a href="categories.html">{{ $state->state_name??'' }}</a></h4>
                                    <p>29 Properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($loop->last)
                    <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{ asset($state->state_imag) }}" alt="" style="width:770px;height:275px;"/></figure>
                                <div class="text">
                                    <h4><a href="categories.html">{{ $state->state_name??'' }}</a></h4>
                                    <p>05 Properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                
                @endforeach
                

                

                

                

            </div>
        </div>
    </div>
</section>