@include('frontend.partials.header')
<div class="header-style-01">
    
    @if($home_variant_number != '03')
        @if(get_static_option('home_page_infobar_section_status')) <!--infobar-area -->
            @include('frontend.partials.infobar.infobar-variant-home-'.$home_variant_number)
        @endif
    @endif
    @if(get_static_option('home_page_navbar_section_status')) <!--navbar-area -->
        @include('frontend.partials.navbar.navbar-variant-home-'.$home_variant_number)
    @endif
</div>
    <!-- Breadcrumb Area -->
    <!-- <div class="breadcrumb-area" 
    {!! render_background_image_markup_by_attachment_id(get_static_option('site_breadcrumb_img')) !!}>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <p>@yield('page-title')</p>
                        <h2 class="page-title">@yield('page-title')</h2>
                        <ul class="page-list">
                            <li><a href="{{url('/')}}">{{__("Home")}}</a></li>
                            @php
                            $pages_list = ['blog','service','product','appointment','contact','about'];
                            @endphp
                            @foreach($pages_list as $page)
                                @if(request()->is(get_static_option($page.'_page_slug').'/*'))
                                <li><a href="{{url('/').'/'.get_static_option($page.'_page_slug')}}">{{get_static_option($page.'_page_' . $user_select_lang_slug . '_name')}}</a></li>
                                @endif
                            @endforeach
                            <li>@yield('page-title')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="banner-header section-padding valign bg-img bg-fixed back-position-center"
     data-overlay-dark="6" data-background="https://duruthemes.com/demo/html/travol/multipage-slider/img/slider/2.jpg" 
     style="background-image: url(https://duruthemes.com/demo/html/travol/multipage-slider/img/slider/2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>@yield('page-title')</h5>
                    <h1>@yield('page-title') <span>Us</span></h1>
                </div>
            </div>
        </div>
    </div>
@yield('content')
@include('frontend.partials.footer')