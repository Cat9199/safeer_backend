<section class="blog-area blog padding-top-110 padding-bottom-100 bg-liteblue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-title-content margin-bottom-45">
                    <div class="section-title">
                        <div class="icon">
                            <i class="{{ get_static_option('site_heading_icon') }}"></i>
                            <span class="line-three"></span>
                            <span class="line-four"></span>
                        </div>
                        <h3 class="title">
                            {{ get_static_option('home_page_latest_blog_section_' . $user_select_lang_slug . '_title') }}
                        </h3>
                    </div>
                    <div class="btn-wrapper">
                        <a href="{{ route('frontend.blog') }}"
                            class="boxed-btn">{{ get_static_option('home_page_latest_blog_section_' . $user_select_lang_slug . '_subtitle') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($all_recent_blogs as $data)
                <!-- <div class="col-md-6 col-lg-4">
                <div class="single-blog-grid-01 margin-bottom-30">
                    <div class="thumb">
                        {!! render_image_markup_by_attachment_id($data->blog_front->image) !!}
                        <div class="news-date">
                            <h5 class="title">{{ date('d', strtotime($data->blog_front->created_at)) }}</h5>
                             <span>{{ date('M', strtotime($data->blog_front->created_at)) }}</span>
                        </div>
                    </div>
                    <div class="content">
                        <ul class="post-meta">
                            <li><i class="far fa-user"></i> {{ $data->blog_front->author ?? __('Anonymous') }}</li>
                            <li><i class="far fa-calendar-alt"></i> {{ $data->blog_front->created_at->diffForHumans() }}</li>
                        </ul>
                        <h4 class="title"><a href="{{ route('frontend.blog.single', ['slug' => $data->blog_front->slug, 'id' => $data->id]) }}">{{ $data->blog_front->title }}</a></h4>
                        <p>{!! \Str::words(strip_tags($data->blog_front->content), 20, '') !!}</p>
                    </div>
                </div>
            </div> -->
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
            @endforeach
        </div>
    </div>
</section>
