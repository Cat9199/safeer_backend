@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-tagsinput.css') }}">
    <x-summernote.css />
    <x-media.css />
@endsection
@section('site-title')
    {{ __('Edit travel ') }}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success />
                <x-msg.error />
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{ __('Edit travel ') }} </h4>
                            <div class="header-title">
                                <a href="{{ route('admin.travel') }}"
                                    class="btn btn-primary mt-4 pr-4 pl-4">{{ __('All travel ') }}</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.travel.update', $travel->id) }}" method="post"
                            enctype="multipart/form-data"> @csrf
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach ($all_languages as $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->first) active @endif"
                                            data-toggle="tab" href="#slider_tab_{{ $lang->slug }}" role="tab"
                                            aria-controls="home" aria-selected="true">{{ $lang->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                @foreach ($all_languages as $key => $lang)
                                    <div class="tab-pane fade @if ($loop->first) show active @endif"
                                        id="slider_tab_{{ $lang->slug }}" role="tabpanel">
                                        @foreach ($travel->lang_all->where('lang', $lang->slug) as $data)
                                            <div class="form-group">
                                                <label for="title">{{ __('Title') }}</label>
                                                <input type="text" class="form-control"
                                                    name="title[{{ $lang->slug }}]" value="{{ $data->title }}"
                                                    placeholder="{{ __('Title') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="title">{{ __('Currency') }}</label>
                                                <input type="text" class="form-control"
                                                    name="currency[{{ $lang->slug }}]" value="{{ $data->currency }}"
                                                    placeholder="{{ __('Currency') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="title">{{ __('Price') }}</label>
                                                <input type="text" class="form-control"
                                                    name="price[{{ $lang->slug }}]" value="{{ $data->price }}"
                                                    placeholder="{{ __('Price') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="title">{{ __('Content') }}</label>
                                                <textarea class="form-control"
                                                name="content[{{ $lang->slug }}]"
                                                placeholder="{{ __('Content') }}">{{ old('content.'.$lang->slug, $data->content) }}</textarea>
                                      
                                            </div>

                                            <div class="form-group">
                                                <label for="title">{{ __('From') }}</label>
                                                <input type="text" class="form-control" name="from[{{ $lang->slug }}]"
                                                    value="{{ $data->from }}" placeholder="{{ __('From') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="title">{{ __('To') }}</label>
                                                <input type="text" class="form-control" name="to[{{ $lang->slug }}]"
                                                    value="{{ $data->to }}" placeholder="{{ __('To') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="offer_{{$lang->slug}}_title">{{__('Offet Title')}}</label>
                                                <input type="text" name="offer_[{{$lang->slug}}]"  class="form-control" value="{{get_static_option('offer_'.$lang->slug.'_title')}}" id="offer_{{$lang->slug}}_title">
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <label for="title">{{__('Phone')}}</label>
                                    <input type="text" class="form-control" name="phone" placeholder="{{__('Phone')}}">
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="image">{{__('Image')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $image = get_attachment_image_by_id($travel->image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($image))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$image['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="image" name="image" value="{{$travel->image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($image_btn_label)}}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png')}} 350 × 500 px</small>
                                </div>
                                <div class="form-group">
                                    <label for="image">{{__('Gallery')}}</label>
                                    @php
                                        $gallery_images = !empty( $travel->gallery) ? explode('|', $travel->gallery) : [];
                                    @endphp
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @foreach($gallery_images as $gl_img)
                                                @php
                                                    $work_section_img = get_attachment_image_by_id($gl_img,null,true);
                                                @endphp
                                                @if (!empty($work_section_img))
                                                    <div class="attachment-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered">
                                                                <img class="avatar user-thumb" src="{{$work_section_img['img_url']}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <input type="hidden" name="gallery" value="{{$travel->gallery}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__('Upload Image')}}
                                        </button>
                                    </div>
                                    <small>{{__('Recommended image size 1920x1280')}}</small>
                                </div>
                                <button type="submit" id="update"
                                    class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup />
@endsection
@section('script')
    <x-summernote.js />
    <x-media.js />
    <script src="{{ asset('assets/backend/js/bootstrap-tagsinput.js') }}"></script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                <
                x - btn.update / >
            });
        })(jQuery)
    </script>
@endsection
