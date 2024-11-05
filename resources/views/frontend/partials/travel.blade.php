<section
    class="creative-team-area @if (in_array(\Route::current()->getName(), ['homepage', 'homepage.demo'])) padding-top-110 @endif padding-bottom-85 @if ($home_variant_number == '02') bg-image bg-liteblue @endif"
    @if ($home_variant_number == '02') {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_team_section_bg')) !!} @endif>
    <div class="container">
        <div class="row justify-content-center padding-bottom-45">
            <div class="col-lg-8">
                <div class="section-title desktop-center">
                    <div class="icon">
                        <span class="line-one"></span>
                        <span class="line-two"></span>
                        <i class="{{ get_static_option('site_heading_icon') }}"></i>
                        <span class="line-three"></span>
                        <span class="line-four"></span>
                    </div>
                    <h2 class="title">{{ __('Travels') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($all_travels as $key => $data)
                <div @if($key == 0) class="col-lg-8" @else class="col-lg-4" @endif>
                    <div class="item-appointment-single">
                        <div class="position-re o-hidden">
                            <img src="{!! render_background_image_markup_by_attachment_id_without_style($data->image, '', 'grid') !!}" alt="">
                        </div> <span class="category">
                            <a href="#">{{ $data->lang_front->currency }}{{ $data->lang_front->price }}</a></span>
                        <div class="con">
                            <div class="rating">
                                {{-- <i class="star active"></i>
                                <i class="star active" style="width: {{ ($average_ratings / 5) * 100 }}%"></i> --}}
                                <i class="star"></i>
                                <div class="reviews-count">({{ count($data->ratings) }})</div>
                            </div>
                            <h5><a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">France
                                    Tour</a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-12">
                                    <ul>
                                        <li><i class="flaticon-compass"></i> {{ __('From') }} :
                                            {{ $data->lang_front->to }}</li>
                                        <li><i class="flaticon-compass"></i> {{ __('To') }} :
                                            {{ $data->lang_front->to }}</li>
                                        {{-- <li><i class="flaticon-compass"></i> {{ __('Price') }} :
                                            </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="appointment-single-item">
                        <div class="thumb" {!! render_background_image_markup_by_attachment_id($data->image, '', 'grid') !!}>

                        </div>
                        <div class="content">
                            <div class="top-part">
                                @if (!empty($data->lang_front->content))
<span class="designation">{{ $data->lang_front->content }}</span>
@endif
                               
                                {{-- @if (count($data->reviews) > 0)
                                @php
                                $average_ratings = App\TravelRatings::Where('travel_id', $data->id)->pluck('ratings')->avg();
                            @endphp
                                    <div class="rating-wrap">
                                        <div class="ratings">
                                            <span class="hide-rating"></span>
                                            <span class="show-rating"
                                                style="width: {{ ($average_ratings / 5) * 100 }}%"></span>
                                        </div>
                                        <p><span class="total-ratings">({{ count($travel->ratings) }})</span></p>
                                    </div>
                                @endif --}}
                            </div>
                            <a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">
                                <a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">
                                    <h4 class="title">{{ Str::words($data->lang_front->title, 5) }}</h4>
                                </a>
                                @if (!empty($data->lang_front->to))
<span class="location"><i
                                            class="fas fa-map-marker-alt"></i>{{ $data->lang_front->to }}</span>
@endif
                                <div class="btn-wrapper">
                                    <a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}" class="boxed-btn">{{ __('Read More') }}</a>
                                </div>

                        </div>
                    </div>   -->
                {{-- <div class="col-lg-8">
                    <div class="item-appointment-single">
                        <div class="position-re o-hidden">
                            <img src="https://duruthemes.com/demo/html/travol/multipage-slider/img/tours/maldives1.jpg"
                                alt="">
                        </div> <span class="category">
                            <a href="#">$400</a></span>
                        <div class="con">
                            <div class="rating">
                                <i class="star active"></i>
                                <i class="star active"></i>
                                <i class="star active"></i>
                                <i class="star active"></i>
                                <i class="star"></i>
                                <div class="reviews-count">(2 Reviews)</div>
                            </div>
                            <h5><a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">France
                                    Tour</a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-12">
                                    <ul>
                                        <li><i class="flaticon-compass"></i> 10 Days</li>
                                        <li><i class="flaticon-compass"></i> 6+</li>
                                        <li><i class="flaticon-compass"></i> France</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item-appointment-single">
                        <div class="position-re o-hidden">
                            <img src="https://duruthemes.com/demo/html/travol/multipage-slider/img/tours/italy1.jpg"
                                alt="">
                        </div> <span class="category">
                            <a href="#">$400</a></span>
                        <div class="con">
                            <h5><a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">France
                                    Tour</a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-12">
                                    <ul>
                                        <li><i class="flaticon-compass"></i> 10 Days</li>
                                        <li><i class="flaticon-compass"></i> 6+</li>
                                        <li><i class="flaticon-compass"></i> France</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item-appointment-single">
                        <div class="position-re o-hidden">
                            <img src="https://duruthemes.com/demo/html/travol/multipage-slider/img/tours/france1.jpg"
                                alt="">
                        </div> <span class="category">
                            <a href="#">$400</a></span>
                        <div class="con">
                            <h5><a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">France
                                    Tour</a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-12">
                                    <ul>
                                        <li><i class="flaticon-compass"></i> 10 Days</li>
                                        <li><i class="flaticon-compass"></i> 6+</li>
                                        <li><i class="flaticon-compass"></i> France</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item-appointment-single">
                        <div class="position-re o-hidden">
                            <img src="https://duruthemes.com/demo/html/travol/multipage-slider/img/tours/france1.jpg"
                                alt="">
                        </div> <span class="category">
                            <a href="#">$400</a></span>
                        <div class="con">
                            <h5><a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">France
                                    Tour</a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-12">
                                    <ul>
                                        <li><i class="flaticon-compass"></i> 10 Days</li>
                                        <li><i class="flaticon-compass"></i> 6+</li>
                                        <li><i class="flaticon-compass"></i> France</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item-appointment-single">
                        <div class="position-re o-hidden">
                            <img src="https://duruthemes.com/demo/html/travol/multipage-slider/img/tours/france1.jpg"
                                alt="">
                        </div> <span class="category">
                            <a href="#">$400</a></span>
                        <div class="con">
                            <h5><a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">France
                                    Tour</a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-12">
                                    <ul>
                                        <li><i class="flaticon-compass"></i> 10 Days</li>
                                        <li><i class="flaticon-compass"></i> 6+</li>
                                        <li><i class="flaticon-compass"></i> France</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endforeach
        </div>
    </div>
</section>
