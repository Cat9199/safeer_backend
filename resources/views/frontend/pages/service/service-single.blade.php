@extends('frontend.frontend-page-master')
@section('site-title')
    {{$service_item->lang_front->title}}
@endsection
@section('page-title')
    {{$service_item->lang_front->title}}   
@endsection
@section('page-meta-data')
<meta name="title" content="{{$service_item->lang_front->meta_title}}">
<meta name="tags" content="{{$service_item->lang_front->meta_tags}} ">
<meta name="description" content="{{$service_item->lang_front->meta_description}}">
@endsection
@section('og-meta')
<meta name="og:title" content="{{$service_item->lang_front->og_meta_title}}">
<meta name="og:description" content="{{$service_item->lang_front->og_meta_description}}">
{!! render_og_meta_image_by_attachment_id($service_item->lang_front->og_meta_image) !!}
@endsection
@section('content')
<div class="page-content our-attoryney padding-top-120 padding-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-item">
                    <div class="thumb padding-bottom-40">
                        {!! render_image_markup_by_attachment_id($service_item->image) !!}
                    </div>
                    <h2 class="title">{{$service_item->lang_front->title}}</h2>
                    <p>{!! $service_item->lang_front->description !!}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-nav-menu margin-bottom-30">
                    <ul>
                        @foreach($service_category as $key=> $data)
                        <li>
                            <a href="{{route('frontend.services.category', ['id' => $data->id , 'any' => Str::slug($data->lang_front->name)])}}" class="service-item-list @if($data->id == $service_item->categories_id) active @endif style-{{($key == '0')? '02' : '02'}}">
                                <div class="service-icon style-{{($key == '0') ? '02' : '02'}}">
                                    <i class="{{$data->icon}}"></i>
                                </div>
                                <div class="service-title">
                                    <h4 class="title">{{$data->lang_front->name}}</h4>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget-nav-contact">
                    <div class="contact-img bg-image">
                        {!! render_image_markup_by_attachment_id(get_static_option('service_page_banner')) !!}
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($price_plan))
        <div class="price-plan-wrapper margin-top-80">
            <div class="row">
                @foreach ($price_plan as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="single-price-plan-01 active">
                        <div class="price-header">
                            <div class="img-icon">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            </div>
                            <h4 class="title">{{$data->lang_front->title}}</h4>
                        </div>
                        <div class="price-body">
                            <ul>
                                @foreach(explode("\n",$data->lang_front->features) as $item)
                                    <li><i class="fa fa-check success"></i> {{$item}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="price-wrap">
                            {!! custom_amount_with_currency_symbol($data->price) !!} <span class="sign">{{ $data->lang_front->type }}</span>
                        </div>
                        <div class="price-footer">
                            <div class="btn-wrapper">
                                <a href="{{ ($data->btn_url) ?? route('frontend.plan.order',['id' => $data->id]) }}" class="boxed-btn">{{$data->lang_front->btn_text}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
