@extends('backend.admin-master')
@section('site-title')
    {{__('Blog Page')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('All Contacr Items')}}  </h4>
                    
                        </div>
                        <x-bulk-action/>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                              
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('email')}}</th>
                                    <th>{{__('phone')}}</th>
                                    <th>{{__('subject')}}</th>
                                    <th>{{__('massage')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_contact as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                     <td>{{$data->phone}}</td>
                                     <td>{{$data->subject}}</td>
                                     <td>{{$data->massage}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-datatable.js/>
<x-media.js/>

@endsection
