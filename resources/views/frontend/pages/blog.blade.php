@extends('frontend.frontend-page-master')
@section('site-title')
    {{ get_static_option('blog_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-title')
    {{ get_static_option('blog_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-meta-data')
<meta name="description" content="{{ get_static_option('blog_page_' . $user_select_lang_slug . '_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('blog_page_' . $user_select_lang_slug . '_meta_tags') }}">
@endsection
@section('content')
    <div class="page-content our-attoryney padding-top-120 padding-bottom-10">
        <div class="container margin-bottom-120">
            <div class="row">
                @if (count($all_blogs) < 1)
                    <div class="col-lg-8">
                        <div class="alert alert-warning alert-block col-md-12">
                            <strong>
                                <div class="error-message"><span>{{ __('No posts available') }}</span></div>
                            </strong>
                        </div>
                    </div>
                @endif
                <div class="col-lg-8">
                    <section class="blog-area blog ">
                        <div class="container">
                    <div class="row">

                        @foreach ($all_blogs as $key => $data)
                            <div class="col-md-4 mb-30">
                                <div class="item">
                                    <div class="position-re o-hidden">
                                        <img src="{!! render_background_image_markup_by_attachment_id_without_style($data->blog_front->image) !!}" alt="">
                                        <div class="date">
                                            <a href="post.html">
                                                <span>{{ date('M', strtotime($data->blog_front->created_at)) }}</span>
                                                <i>{{ date('d', strtotime($data->blog_front->created_at)) }}</i> </a>
                                        </div>
                                    </div>
                                    <div class="con"> <span class="category">
                                            <a
                                                href="{{ route('frontend.blog.single', ['slug' => $data->blog_front->slug, 'id' => $data->id]) }}">{{ $data->blog_front->title }}</a>
                                        </span>
                                        <h5><a
                                                href="{{ route('frontend.blog.single', ['slug' => $data->blog_front->slug, 'id' => $data->id]) }}">{{ $data->blog_front->content }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="blog-classic-item-01 margin-bottom-60">
                            <div class="thumbnail">
                                {!! render_image_markup_by_attachment_id($data->lang_front->image) !!}
                                <div class="news-date">
                                    <h5 class="title">{{ date('d',strtotime($data->lang_front->created_at))}}</h5>
                                    <span>{{ date('M',strtotime($data->lang_front->created_at))}}</span>
                                </div>
                            </div>
                            <div class="content">
                                <ul class="post-meta">
                                    <li><i class="far fa-user"></i> {{ ($data->lang_front->author) ?? __("Anonymous")}}</li>
                                    <li><i class="far fa-calendar-alt"></i> {{ $data->lang_front->created_at->diffForHumans()}}</li>
                                </ul>
                                <h4 class="title"><a href="{{route('frontend.blog.single',['slug' => $data->lang_front->slug, 'id' => $data->id])}}">{{ $data->lang_front->title }}
                                </a></h4>
                                
                                <div class="btn-wrapper">
                                    <a href="{{route('frontend.blog.single',['slug' => $data->lang_front->slug, 'id' => $data->id])}}" class="boxed-btn">{{__('Read More')}}</a>
                                </div>
                            </div>
                        </div>  --}}
                        @endforeach
                    </div>
                    <div class="blog-pagination desktop-center">
                        {{ $all_blogs->links() }}
                    </div>
                </div>
                </div>
            </section>
                <div class="col-lg-4">
                    <div class="widget-area">
                        @include('frontend.partials.sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
