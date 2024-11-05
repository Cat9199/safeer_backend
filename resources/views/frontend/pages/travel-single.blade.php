@extends('frontend.frontend-page-master')
@section('site-title')
    {{ $travel->lang_front->title }}
@endsection
@section('page-title')
    {{ $travel->lang_front->title }}
@endsection


@section('style')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/common/css/toastr.css') }}">
@endsection

@section('content')
    <section class="product-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('backend.partials.message')
                    <div class="single-product-details">
                        <div class="top-content">
                            @if (!empty($travel->gallery))
                                @php
                                    $travel_gllery_images = !empty($travel->gallery)
                                        ? explode('|', $travel->gallery)
                                        : [];
                                @endphp
                                <div class="product-gallery">
                                    <div class="slider-gallery-slider">
                                        @foreach ($travel_gllery_images as $gl_img)
                                            <div class="single-gallery-slider-item">
                                                {!! render_image_markup_by_attachment_id($gl_img, '', 'large') !!}
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="slider-gallery-nav">
                                        @foreach ($travel_gllery_images as $gl_img)
                                            <div class="single-gallery-slider-nav-item">
                                                {!! render_image_markup_by_attachment_id($gl_img, '', 'thumb') !!}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="thumb">
                                    {!! render_image_markup_by_attachment_id($travel->image, '', 'large') !!}
                                </div>
                            @endif
                            <div class="product-summery">
                                @if (count($travel->ratings) > 0)
                                    <div class="rating-wrap">
                                        <div class="ratings">
                                            <span class="hide-rating"></span>
                                            <span class="show-rating"
                                                style="width: {{ ($average_ratings / 5) * 100 }}%"></span>
                                        </div>
                                        <p><span class="total-ratings">({{ count($travel->ratings) }})</span></p>
                                    </div>
                                @endif
                                <div class="price-wrap">
                                    <p>{{ $travel->lang_front->title }}</p>
                                </div>
                                <div class="price-wrap">
                                    <span class="price">{{ $travel->lang_front->currency }}
                                        {{ $travel->lang_front->price }}</span>

                                </div>
                                <div class="short-description">
                                    <p>{{ $travel->lang_front->content }}</p>
                                </div>
                                <div class="cat-sku-content-wrapper">
                                    <div class="category-wrap">
                                        <span class="title">{{ __('From') }}:</span>
                                        <a href="#">{{ $travel->lang_front->from }}</a>
                                    </div>
                                    <div class="sku-wrap"><span class="title">{{ __('To') }}:</span>
                                        <span class="sku_">{{ $travel->lang_front->to }}</span>
                                    </div>
                                    <div class="sku-wrap"><span class="title">{{ __('Phone') }}:</span>
                                        <a href="https://wa.me/{{ $travel->phone }}"
                                            target="_blank"><span class="sku_">{{ $travel->phone }}</span></a>
                                        
                                    </div>
                                    @php
                                        $option_name = 'offer_' . $travel->lang_front->lang . '_title';
                                    @endphp
                                  
                                    
                                </div>
                            </div>
                        </div>

                        <div class="bottom-content">
                            <div class="extra-content-wrap">
                                <nav>
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-description"
                                            role="tab" aria-selected="true">{{ __('Content') }}</a>

                                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-ratings" role="tab"
                                            aria-selected="false">{{ __('Ratings') }}</a>
                                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-offers" role="tab"
                                            aria-selected="false">{{ __('Offers') }}</a>
                                    </div>
                                </nav>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel">
                                        <div class="product-description">
                                            {!! $travel->lang_front->content !!}
                                        </div>
                                    </div>

                                    
                                    <div class="tab-pane fade" id="nav-ratings" role="tabpanel">
                                        <div class="product-rating">
                                            <div class="rating-wrap">
                                                <div class="ratings">
                                                    <span class="hide-rating"></span>
                                                    <span class="show-rating"
                                                        style="width: {{ ($average_ratings / 5) * 100 }}%"></span>
                                                </div>
                                                <p><span class="total-ratings">({{ count($travel->ratings) }})</span></p>
                                            </div>
                                            @if (count($travel->ratings) > 0)
                                                <ul class="product-rating-list">
                                                    @foreach ($travel->ratings as $rating)
                                                        <li>
                                                            <div class="single-product-rating-item">
                                                                <div class="content">
                                                                    <h4 class="title">
                                                                        {{ get_user_name_by_id($rating->user_id) ? get_user_name_by_id($rating->user_id)->name : __('anonymous') }}
                                                                    </h4>
                                                                    <div class="ratings text-warning">
                                                                        {!! render_ratings($rating->ratings) !!}
                                                                    </div>
                                                                    <p>{{ $rating->message }}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <div class="product-ratings-form">
                                                @if (auth()->check())
                                                    <h4 class="title">{{ __('Leave A Review') }}</h4>
                                                    @if ($errors->any())
                                                        <ul class="alert alert-danger">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                    <form action="{{ route('travel.ratings') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="travel_id" value="{{ $travel->id }}">
                                                        <div class="form-group">
                                                            <label
                                                                for="rating-empty-clearable2">{{ __('Ratings') }}</label>
                                                            <input type="number" name="ratings"
                                                                id="rating-empty-clearable2" class="rating text-warning" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ratings_message">{{ __('Message') }}</label>
                                                            <textarea name="ratings_message" class="form-control" id="ratings_message" cols="30" rows="5"
                                                                placeholder="{{ __('Message') }}"></textarea>
                                                        </div>
                                                        <div class="btn-wrapper">
                                                            <button type="submit"
                                                                class="btn-small style-01">{{ __('Submit') }}</button>
                                                        </div>
                                                    </form>
                                                @else
                                                    @include('frontend.partials.ajax-form.ajax-login-form')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-offers" role="tabpanel">
                                        <div class="product-description">
                                            {{ get_static_option($option_name) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/fontawesome-mod.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap4-rating-input.js') }}"></script>
    <script src="{{ asset('assets/common/js/toastr.min.js') }}"></script>
    @include('frontend.partials.ajax-form.ajax-login-form-js')
    <script>
        (function($) {
            "use strict";

            var rtlEnable = $('html').attr('dir');
            var sliderRtlValue = typeof rtlEnable === 'undefined' || rtlEnable === 'ltr' ? false : true;

            $(document).ready(function() {

                $('.slider-gallery-slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-gallery-nav',
                    rtl: sliderRtlValue
                });
                $('.slider-gallery-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-gallery-slider',
                    dots: false,
                    arrows: false,
                    centerMode: false,
                    focusOnSelect: true,
                    rtl: sliderRtlValue
                });


            });

        })(jQuery)
    </script>
@endsection
