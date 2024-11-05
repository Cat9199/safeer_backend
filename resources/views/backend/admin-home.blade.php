@extends('backend.admin-master')
@section('site-title')
{{__('Dashboard')}}
@endsection
@section('content')
@php
$statistics = [
['title' => 'Total Admin','value' => $total_admin, 'icon' => 'user-secret'],
['title' => 'Total User','value' => $total_user, 'icon' => 'user'],
['title' => 'Total Product','value' => $total_product, 'icon' => 'shopping-cart'],
['title' => 'Total Products View','value' => $total_product_view, 'icon' => 'eye']
];
@endphp
<div class="main-content-inner">
    <div class="row">
        <!-- seo fact area start -->
        <div class="col-lg-12">
            <div class="row">
                @foreach ($statistics as $data)
                <div class="col-md-4 mt-5 mb-3">
                    <div class="card card-hover">
                        <div class="dash-box text-white">
                            <h1 class="dash-icon">
                                <i class="fas fa-{{ $data['icon'] }} mb-1 font-16"></i>
                            </h1>
                            <div class="dash-content">
                                <h5 class="mb-0 mt-1">{{ $data['value'] }}</h5>
                                <small class="font-light">{{ __($data['title']) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection