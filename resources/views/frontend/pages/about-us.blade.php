@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('about_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-title')
    {{get_static_option('about_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-meta-data')
<meta name="description" content="{{get_static_option('about_page_'.$user_select_lang_slug.'_meta_description')}}">
<meta name="tags" content="{{get_static_option('about_page_'.$user_select_lang_slug.'_meta_tags')}}">
@endsection
@section('content')
    @if(get_static_option('about_page_full_width_service_section_status'))<!--full-width-service-area -->
        @include('frontend.partials.full-width-service.full-width-service-variant-04')
    @endif

  
@endsection
