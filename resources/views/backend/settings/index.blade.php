@extends('backend.admin-master')
@section('site-title')
{{ __('Settings') }}
@endsection
@section('content')
<div class="col-lg-12 col-ml-12 padding-bottom-30">
      <div class="row">
            <div class="col-12 mt-5">
                  <x-msg.success />
                  <x-msg.error />
                  <div class="card">
                        <div class="card-body">
                              <h4 class="header-title">{{ __("Settings") }}</h4>
                              <form action="{{ route('admin.settings.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Site Settings -->
                                    <div class="form-group">
                                          <label for="domain">{{ __('Domain') }}</label>
                                          <input type="url" name="domain" class="form-control"
                                                value="{{ $settings->domain }}" id="domain">
                                    </div>
                                    <div class="form-group">
                                          <label for="email">{{ __('Email') }}</label>
                                          <input type="email" name="email" class="form-control"
                                                value="{{ $settings->email }}" id="email">
                                    </div>
                                    <div class="form-group">
                                          <label for="phone">{{ __('Phone') }}</label>
                                          <input type="text" name="phone" class="form-control"
                                                value="{{ $settings->phone }}" id="phone">
                                    </div>
                                    <div class="form-group">
                                          <label for="address">{{ __('Address') }}</label>
                                          <input type="text" name="address" class="form-control"
                                                value="{{ $settings->address }}" id="address">
                                    </div>

                                    <!-- Social Media Links -->
                                    <h5 class="mt-4">{{ __('Social Media Links') }}</h5>
                                    <div class="form-group">
                                          <label for="facebook">{{ __('Facebook') }}</label>
                                          <input type="url" name="facebook" class="form-control"
                                                value="{{ $settings->facebook }}" id="facebook">
                                    </div>
                                    <div class="form-group">
                                          <label for="twitter">{{ __('Twitter') }}</label>
                                          <input type="url" name="twitter" class="form-control"
                                                value="{{ $settings->twitter }}" id="twitter">
                                    </div>
                                    <div class="form-group">
                                          <label for="instagram">{{ __('Instagram') }}</label>
                                          <input type="url" name="instagram" class="form-control"
                                                value="{{ $settings->instagram }}" id="instagram">
                                    </div>
                                    <div class="form-group">
                                          <label for="linkedin">{{ __('LinkedIn') }}</label>
                                          <input type="url" name="linkedin" class="form-control"
                                                value="{{ $settings->linkedin }}" id="linkedin">
                                    </div>
                                    <div class="form-group">
                                          <label for="whatsapp">{{ __('WhatsApp') }}</label>
                                          <input type="url" name="whatsapp" class="form-control"
                                                value="{{ $settings->whatsapp }}" id="whatsapp">
                                    </div>

                                    <!-- Text Areas for Additional Information -->
                                    <h5 class="mt-4">{{ __('Additional Information') }}</h5>
                                    <div class="form-group">
                                          <label for="about_us">{{ __('About Us') }}</label>
                                          <textarea name="about_us" class="form-control" rows="4"
                                                id="about_us">{{ $settings->about_us }}</textarea>
                                    </div>
                                    <div class="form-group">
                                          <label for="terms_and_conditions">{{ __('Terms and Conditions') }}</label>
                                          <textarea name="terms_and_conditions" class="form-control" rows="4"
                                                id="terms_and_conditions">{{ $settings->terms_and_conditions }}</textarea>
                                    </div>
                                    <div class="form-group">
                                          <label for="privacy_policy">{{ __('Privacy Policy') }}</label>
                                          <textarea name="privacy_policy" class="form-control" rows="4"
                                                id="privacy_policy">{{ $settings->privacy_policy }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Save Settings')
                                          }}</button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection