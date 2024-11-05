@extends('frontend.frontend-page-master')
@section('page-title')
    {{ get_static_option('contact_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('site-title')
    {{ get_static_option('contact_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-meta-data')
    <meta name="description"
        content="{{ get_static_option('contact_page_' . $user_select_lang_slug . '_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('contact_page_' . $user_select_lang_slug . '_meta_tags') }}">
@endsection
@section('content')
    @if (get_static_option('contact_page_contact_section_status'))
        <!-- Contact Area -->
        <!--<div class="contact-inner-area padding-bottom-120 padding-top-120">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-lg-5">-->
        <!--                <div class="content-area">-->
        <!--                    <div class="section-title padding-bottom-25">-->
        <!--                        <h4 class="title">{{ get_static_option('home_page_contact_us_section_' . $user_select_lang_slug . '_title') }} </h4>-->
        <!--                    </div>-->
        <!--                    <div class="single-contact-item">-->
        <!--                        <div class="icon">-->
        <!--                            <i class="flaticon-phone"></i>-->
        <!--                        </div>-->
        <!--                        <div class="content">-->
        <!--                            <span class="title">{{ __('Phone') }}</span>-->
        <!--                            <p class="details">-->
        <!--                                @foreach (explode("\n", get_static_option('home_page_contact_us_section_' . $user_select_lang_slug . '_contact')) as $item)
    -->
        <!--                                        {{ $item }}<br>-->
        <!--
    @endforeach-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="single-contact-item">-->
        <!--                        <div class="icon">-->
        <!--                            <i class="flaticon-mail-2"></i>-->
        <!--                        </div>-->
        <!--                        <div class="content">-->
        <!--                            <span class="title">{{ __('Mail US') }}</span>-->
        <!--                            <p class="details">-->
        <!--                                @foreach (explode("\n", get_static_option('home_page_contact_us_section_' . $user_select_lang_slug . '_email')) as $item)
    -->
        <!--                                        {{ $item }}<br>-->
        <!--
    @endforeach-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="single-contact-item">-->
        <!--                        <div class="icon">-->
        <!--                            <i class="flaticon-pin"></i>-->
        <!--                        </div>-->
        <!--                        <div class="content">-->
        <!--                            <span class="title">{{ __('Address') }}-->
        <!--                        </span>-->
        <!--                        <p class="details">-->
        <!--                            @foreach (explode("\n", get_static_option('home_page_contact_us_section_' . $user_select_lang_slug . '_address')) as $item)
    -->
        <!--                                    {{ $item }}<br>-->
        <!--
    @endforeach-->
        <!--                        </p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-lg-6 offset-lg-1">-->
        <!--                <div class="contact-form style-01">-->
        <!--                    <form action="{{ route('frontend.contact.message') }}" method="POST" class="contact-page-form style-01" id="contact_us_form">-->
        <!--                        <input type="hidden" name="captcha_token" id="gcaptcha_token">-->
        <!--                        @csrf-->
        <!--                        <div class="error-message margin-bottom-20"> </div>-->
        <!--                            {!! render_form_field_for_frontend(get_static_option('contact_page_contact_form_fields')) !!}-->
        <!--                        <div class="btn-wrapper">-->
        <!--                            <a href="#" class="boxed-btn btn-block" id="contact_us_submit_btn"><span>{{ __('Submit Message') }}</span></a>-->
        <!--                        </div>-->
        <!--                    </form>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
            <div class="container">
                <div class="row gx-60">
                    <div class="col-lg-8 wow fadeInUp animated" data-wow-delay="0.3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: g;">
                        <form action="{{ route('frontend.contact.message') }}" method="POST" class="ajax-contact form-wrap5 p-0 mb-30" id="contact_us_form">
                            <div class="error-message"></div>
                            <input type="hidden" name="captcha_token" id="gcaptcha_token">
                            @csrf
                            <div class="form-title">
                                <h3 class="mt-n2 fls-n2 mb-0">{{ __('Feel free to contact us') }}</h3>
                            </div>
                            <div class="row">
                                <!-- Form fields go here -->
                                <div class="form-group col-lg-6 mb-15">
                                    <input type="text" class="form-control style3" name="subject" id="subject" placeholder="Your Subject *">
                                </div>
                                <div class="form-group col-lg-6 mb-15">
                                    <input type="text" class="form-control style3" name="name" id="name" placeholder="Your Name *">
                                </div>
                                <div class="form-group col-lg-6 mb-15">
                                    <input type="text" class="form-control style3" name="email" id="email" placeholder="Your Email *">
                                </div>
                                <div class="form-group col-lg-6 mb-15">
                                    <input type="text" class="form-control style3" name="phone" id="phone" placeholder="Your phone *">
                                </div>
                                <div class="form-group mb-40 col-lg-12 mb-15">
                                    <textarea name="message" id="message" cols="10" rows="1" class="form-control style3" placeholder="Message"></textarea>
                                </div>
                                <div class="form-btn col-lg-6 pt-15">
                                    <input class="vs-btn style2" type="submit" id="contact_us_submit_btn" value="Send Message">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-information pt-0 mb-30">
                            <h3 class="mb-30">{{ __('Contacts') }}</h3>
                            <h5>{{ _('Egypt') }} :</h5>
                            <ul class="mb-40">
                                <li>{{__('Hurghada Sheraton Street')}}</li>
                                <li><a href="mailto:orantentravel@gmail.com">orantentravel@gmail.com</a></li>
                                <li>
                                    <a href="https://wa.me/201013800463" target="_blank">+201013800463</a>, 
                                    <a href="https://wa.me/201040719557" target="_blank">+201040719557</a>
                                </li>
                            </ul>
                            
                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (get_static_option('contact_page_map_section_status'))
        <!-- Map Area -->
        <div class="map-area">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="contact_map">
                            {!! render_embed_google_map(
                                get_static_option('contact_page_map_section_location'),
                                get_static_option('contact_page_map_section_zoom'),
                            ) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    @if (!empty(get_static_option('site_google_captcha_v3_site_key')))
        <script src="https://www.google.com/recaptcha/api.js?render={{ get_static_option('site_google_captcha_v3_site_key') }}"></script>
        <script>
            (function() {
                "use strict";
                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ get_static_option('site_google_captcha_v3_site_key') }}", {
                        action: 'homepage'
                    }).then(function(token) {
                        document.getElementById('gcaptcha_token').value = token;
                    });
                });
            })();
        </script>
    @endif
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                function removeTags(str) {
                    if ((str === null) || (str === '')) {
                        return false;
                    }
                    str = str.toString();
                    return str.replace(/(<([^>]+)>)/ig, '');
                }

                $(document).on('click', '#contact_us_submit_btn', function(e) {
                    e.preventDefault();
                    var el = $(this);
                    var myForm = document.getElementById('contact_us_form');
                    var formData = new FormData(myForm);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('frontend.contact.message') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            el.val('{{ __("Submitting") }}').prop('disabled', true);
                        },
                        success: function(data) {
                            var errMsgContainer = $('#contact_us_form').find('.error-message');
                            errMsgContainer.html('');

                            if (data.type === 'success') {
                                errMsgContainer.html('<div class="alert alert-success">' + removeTags(data.msg) + '</div>');
                            } else {
                                errMsgContainer.html('<div class="alert alert-warning">' + removeTags(data.msg) + '</div>');
                            }

                            $('#contact_us_form').find('.form-control').val('');
                            el.val('{{ __("Send Message") }}').prop('disabled', false);
                        },
                        error: function(data) {
                            var error = data.responseJSON;
                            var errMsgContainer = $('#contact_us_form').find('.error-message');
                            errMsgContainer.html('<div class="alert alert-danger"></div>');

                            if (error && error.errors) {
                                $.each(error.errors, function(index, value) {
                                    errMsgContainer.find('.alert').append('<span>' + removeTags(value) + '</span><br>');
                                });
                            } else {
                                errMsgContainer.find('.alert').append('<span>{{ __("An unexpected error occurred. Please try again later.") }}</span>');
                            }

                            el.val('{{ __("Send Message") }}').prop('disabled', false);
                        }
                    });
                });
            });
        })(jQuery);
    </script>
@endsection
