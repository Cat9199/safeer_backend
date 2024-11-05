<div class="header-style-01">
    <!-- @if (get_static_option('home_page_topbar_section_status'))
@include('frontend.partials.topbar')
@endif -->
    @if (get_static_option('home_page_infobar_section_status'))
        @include('frontend.partials.infobar.infobar-variant-home-' . $home_variant_number)
    @endif
    @if (get_static_option('home_page_navbar_section_status'))
        @include('frontend.partials.navbar.navbar-variant-home-' . $home_variant_number)
    @endif
</div>
<section class="header-slide slider-fade">
    <div class="owl-carousel owl-theme">
        @foreach ($heaer_sliders as $data)
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            <div class="text-center item bg-img" data-overlay-dark="5"
                style="background-image: url({!! render_background_image_markup_by_attachment_id_without_style($data->image) !!});" data-background="">
                <div class="v-middle caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h4>{{ $data->title }}</h4>
                                <h1>{{ $data->subtitle }} <span>{{ $data->support_title }}</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>
<!-- @if (get_static_option('home_page_header_slider_section_status'))
    <div class="header-slider-one">
        @foreach ($heaer_sliders as $data)
<div class="header-area header-bg" {!! render_background_image_markup_by_attachment_id($data->image) !!}>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-inner">
                             <span class="subtitle">{{ $data->subtitle }}</span>
                            <h1 class="title">{{ $data->title }}</h1>
                            <div class="header-bottom">
                               
                                <div class="header-buttom-content style-01">
                                    <p>{{ $data->support_title }}</p>
                                    <span>{{ $data->support_details }}</span>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
         </div>
@endforeach
    </div>
    @endif -->


@include('frontend.partials.travel')



@if (get_static_option('home_page_testimonial_section_status'))
    <!--testimonial-area -->
    @include('frontend.partials.testimonial.testimonial-variant-01')
@endif
@if (get_static_option('home_page_latest_blog_section_status'))
    <!--keyfeature-area -->
    @include('frontend.partials.blog-latest-area')
@endif
