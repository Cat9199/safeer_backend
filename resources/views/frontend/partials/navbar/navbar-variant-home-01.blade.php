<style>
    .right-content {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .info-items {
        display: flex;
        list-style: none;
        gap: 15px;
        /* Adds space between the list items */
        padding: 0;
    }

    .info-items li {
        margin: 0;
        font-size: 16px;
        position: relative;
        /* For positioning popup */
    }

    .language_dropdown {
        position: relative;
        margin-left: 15px;
    }

    .language_dropdown .selected-language {
        cursor: pointer;
        display: flex;
        align-items: center;
        font-size: 14px;
    }

    .language_dropdown ul {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 10px;
        z-index: 10;
    }

    .language_dropdown:hover ul {
        display: block;
    }

    .language_dropdown ul li {
        padding: 5px 10px;
        cursor: pointer;
    }

    .language_dropdown ul li:hover {
        background-color: #f0f0f0;
    }

    /* Car Icon */
    .car-icon {
        color: #333;
        /* Default car icon color */
        margin-left: 10px;
        font-size: 28px;
        transition: color 0.3s ease, transform 0.3s ease;
        cursor: pointer;
    }

    .car-icon:hover {
        color: #00e676;
        transform: scale(1.1);
    }

    /* Popup Text */
    .popup-text {
        display: none;
        position: absolute;
        bottom: 100%;
        /* Position above the icon */
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        white-space: nowrap;
        font-size: 14px;
        z-index: 10;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Show the popup on hover */
    .icon-container:hover .popup-text {
        display: block;
        opacity: 1;
    }
</style>
<nav class="navbar navbar-area navbar-expand-lg has-topbar nav-style-02">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="{{ route('homepage') }}" class="logo">
                    <!-- {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!} -->
                    <img src="{{ asset('/@core/public/assets/uploads/media-uploader/logoOreantent.svg') }}"
                        alt="logo">

                </a>
            </div>
            <!--<div class="mobile-cart"><a href="{{ route('frontend.products.cart') }}"><i class="{{ get_static_option('shopping_cart_icon') }}"></i> <span class="pcount">0</span></a></div>-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        {{-- <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
            <ul class="navbar-nav">
                 {!! render_menu_by_id($primary_menu) !!}
            </ul>
        </div> --}}
        <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
            <ul class="navbar-nav">
                <li class="{{ Request::is('/') ? 'current-menu-item' : '' }}">
                    <a href="{{ url('/') }}">{{ __('Home') }}</a>
                </li>
                <li class="{{ Request::is('about-us') ? 'current-menu-item' : '' }}">
                    <a href="{{ url('about-us') }}">{{ __('About Us') }}</a>
                </li>
                <li class="{{ Request::is('blog') ? 'current-menu-item' : '' }}">
                    <a href="{{ url('blog') }}">{{ __('Blog') }}</a>
                </li>
                <li class="{{ Request::is('contact-us') ? 'current-menu-item' : '' }}">
                    <a href="{{ url('contact-us') }}">{{ __('Contact Us') }}</a>
                </li>
                <li class="{{ Request::is('travel') ? 'current-menu-item' : '' }}">
                    <a href="{{ url('travel') }}">{{ __('Travel') }}</a>
                </li>
            </ul>
        </div>

        <div class="nav-right-content">
            <div class="icon-part nav-style-01">
                <ul>
                    <li class="cart"><a href="{{ route('frontend.products.cart') }}"><i
                                class="{{ get_static_option('shopping_cart_icon') }}"></i> <span
                                class="pcount">{{ cart_total_items() }}</span></a></li>
                </ul>
            </div>
            @if (!empty(get_static_option('navbar_button')))
                <div class="btn-wrapper">
                    @php
                        $button_url =
                            get_static_option('navbar_button_url_' . $user_select_lang_slug) ?? route('frontend.quote');
                    @endphp
                    <a href="{{ $button_url }}"
                        class="request-btn">{{ get_static_option('navbar_button_text_' . $user_select_lang_slug) }}<i
                            class="{{ get_static_option('navbar_button_icon') }}"></i></a>
                </div>
            @endif
        </div>
        <div class="right-content">
            <ul class="info-items">
                @if (auth()->check())
                    @php
                        $route = auth()->user()->is_admin ? route('admin.home') : route('user.home');
                    @endphp
                    <li>
                        <a href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();
                                    jQuery('#userlogout-form-submit-btn').trigger('click');">
                            {{ __('Logout') }}
                        </a>
                        <form id="userlogout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                            @csrf
                            <input type="submit" value="Logout" id="userlogout-form-submit-btn" class="d-none">
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('user.login') }}">{{ __('Login') }}</a></li>
                    <li>/</li>
                    <li><a href="{{ route('user.register') }}">{{ __('Register') }}</a></li>
                @endif

                <div class="language_dropdown" id="languages_selector">
                    <div class="selected-language">{{ get_language_name_by_slug(get_user_lang()) }} <i
                            class="fas fa-caret-down"></i></div>
                    <ul>
                        @foreach ($all_language as $lang)
                            <li data-value="{{ $lang->slug }}">{{ $lang->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Car Icon with Hover Text for WhatsApp -->
                <a href="https://wa.me/201013800463" target="_blank">
                    <li class="icon-container">
                        <i class="fa fa-car fa-2x car-icon" aria-hidden="true"></i>
                        <div class="popup-text">{{ __('Transfer') }}</div>
                    </li>
                </a>
            </ul>
        </div>


    </div>
</nav>
