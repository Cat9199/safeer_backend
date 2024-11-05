 <!-- <div class="eco-friendly-area margin-top-120 margin-bottom-120">
    <div class="container">
        <div class="eco-friendly-area-wrapper padding-top-60 padding-bottom-60">
            <div class="bg-img-02 about" {!! render_background_image_markup_by_attachment_id(get_static_option('about_page_full_width_service_section_bg_img_right')) !!}></div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="eco-content bg-white style-01">
                        <div class="section-title">
                            <div class="icon">
                                <i class="{{get_static_option('site_heading_icon')}}"></i>
                                <span class="line-three"></span>
                                <span class="line-four"></span>
                            </div>
                            <h3 class="title">{{get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_title')}}</h3>
                            <p>{{get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_description')}}</p>
                        </div>
                        <div class="content style-01">
                            <ul>
                                @foreach(explode("\n",get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_features')) as $item)
                                    <li><i class="fas fa-check"></i> {{$item}}</li> 
                                @endforeach
                            </ul>
                            <div class="available-item style-01">
                                <div class="icon">
                                    <i class="{{get_static_option('about_page_full_width_service_section_support_icon')}}"></i>
                                </div>
                                <div class="content">
                                    <span>{{get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_support_title')}}</span>
                                    <p>{{get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_support_details')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   -->

<section class="about cover section-padding">
        <div class="container">
            
            <div class="row">
                <div class="col-md-6 mb-30 animate-box fadeInUp animated" data-animate-effect="fadeInUp">
                <h3 class="title">{{get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_title')}}</h3>

                <p>{{get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_description')}}</p>
                      <ul class="list-unstyled about-list mb-30">
                                @foreach(explode("\n",get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_features')) as $item)
                              <li> <span><i class="fas fa-check"></i></span> {{$item}}</li> 
                                @endforeach
                            </ul>
                            <div class="available-item style-01">
                                <div class="icon">
                                    <i class="{{get_static_option('about_page_full_width_service_section_support_icon')}}"></i>
                                </div>
                                <div class="content">
                                    <span>{{get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_support_title')}}</span>
                                    <p>{{get_static_option('about_page_full_width_service_section_'.$user_select_lang_slug.'_support_details')}}</p>
                                </div>
                            </div>
                </div>
                <div class="col-md-5 offset-md-1 animate-box fadeInUp animated" data-animate-effect="fadeInUp">
                    <div class="img-exp">
                        <div class="about-img">
                            <div class="img">
                                 <img src="https://duruthemes.com/demo/html/travol/multipage-slider/img/about.jpeg"
                                  class="img-fluid" alt=""> </div>
                        </div>
                        <div id="circle">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                                <defs>
                                    <path id="circlePath" d=" M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "></path>
                                </defs>
                                <circle cx="150" cy="100" r="75" fill="none"></circle>
                                <g>
                                    <use xlink:href="#circlePath" fill="none"></use>
                                    <text fill="#0f2454">
                                        <textPath xlink:href="#circlePath"> . travel agency . travel agency </textPath>
                                    </text>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>