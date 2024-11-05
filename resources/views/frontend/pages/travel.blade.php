@extends('frontend.frontend-page-master')
@section('site-title')
    {{ __('Travels') }}
@endsection
@section('page-title')
    {{ __('Travels') }}
@endsection
@section('page-meta-data')
    <meta name="description" content=" {{ __('Travels') }}">
    <meta name="tags" content=" {{ __('Travels') }}">
@endsection
@section('content')
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-lg-2">
                    <div class="row">
                        @foreach ($all_travels as $data)
                            @if ($data->lang_front != null)
                                <div class="col-lg-4">
                                    <div class="item-appointment-single">
                                        <div class="position-re o-hidden">
                                            <img src="{!! render_background_image_markup_by_attachment_id_without_style($data->image, '', 'grid') !!}" alt="">
                                        </div> <span class="category">
                                            <a
                                                href="#">{{ $data->lang_front->currency }}{{ $data->lang_front->price }}</a></span>
                                        <div class="con">
                                            <div class="rating">
                                                {{-- <i class="star active"></i>
                                <i class="star active" style="width: {{ ($average_ratings / 5) * 100 }}%"></i> --}}
                                                <i class="star"></i>
                                                <div class="reviews-count">({{ count($data->ratings) }})</div>
                                            </div>
                                            <h5><a href="{{ route('frontend.travel_single_page', ['id' => $data->id]) }}">France
                                                    Tour</a> </h5>
                                            <div class="line"></div>
                                            <div class="row facilities">
                                                <div class="col col-md-12">
                                                    <ul>
                                                        <li><i class="flaticon-compass"></i> {{ __('From') }} :
                                                            {{ $data->lang_front->to }}</li>
                                                        <li><i class="flaticon-compass"></i> {{ __('To') }} :
                                                            {{ $data->lang_front->to }}</li>
                                                        <li>
                                                            <i class="flaticon-compass"></i> {{ __('Phone') }} :
                                                            <a href="https://wa.me/{{ $data->phone }}"
                                                                target="_blank">{{ $data->phone }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="col-lg-12 text-center">
                            <nav class="pagination-wrapper " aria-label="Page navigation ">
                                {{ $all_travels->links() }}
                            </nav>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
