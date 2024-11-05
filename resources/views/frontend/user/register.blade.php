@extends('frontend.frontend-page-master')
@section('site-title')
    {{ __('Register') }}
@endsection
@section('page-title')
    {{ __('Register') }}
@endsection
@section('content')
    <section class="login-page-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 margin-bottom-120 margin-top-60">
                    <div class="login-form-wrapper contact-form">
                        <h3 class="text-center title margin-bottom-30">{{ __('Register New Account') }}</h3>
                        @include('backend.partials.message')
                        @include('backend.partials.error')
                        <form action="{{ route('user.register') }}" method="post" enctype="multipart/form-data"
                            class="contact-page-form style-01">
                            @csrf
                            {{-- <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="{{__('Name')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="{{__('Username')}}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="{{__('Email')}}">
                            </div>
                        
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="{{__('City')}}">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{__('Confirm Password')}}">
                            </div> --}}
                            <div class="row">
                                <div class="form-group col-lg-6 mb-15">
                                    <input type="text" class="form-control style3" name="name" id="name"
                                        placeholder="{{ __('Name') }}">
                                </div>
                                <div class="form-group col-lg-6 mb-15">
                                    <input type="text" class="form-control style3" name="email" id="email"
                                        placeholder="{{ __('Email') }}">
                                </div>
                                <div class="form-group col-lg-12 mb-15">
                                    <input type="text" class="form-control style3" name="username" id="username"
                                        placeholder="{{ __('Username') }}">
                                </div>
                           
                                <div class="form-group mb-40 col-lg-6 mb-15">
                                    <input type="password" id="password" name="password" class="form-control style3"
                                        placeholder="{{ __('Password') }}">
                                </div>
                                <div class="form-group mb-40 col-lg-6 mb-15">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control style3"
                                        placeholder="{{ __('Confirm Password') }}">
                                </div>
                                <div class="form-group mb-40 col-lg-12 mb-15">
                                    <button class="boxed-btn btn-block" id="register"
                                        type="submit">{{ __('Register') }}</button>
                                </div>
                            </div>

                            <div class="row mb-4 rmber-area">
                                <div class="col-12 text-center">
                                    <a href="{{ route('user.login') }}">{{ __('Already Have account?') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                <
                x - btn.custom: id = "'register'": title = "__('Please Wait')" / >
            });
        })(jQuery);
    </script>
@endsection
