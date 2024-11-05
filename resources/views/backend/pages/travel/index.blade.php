@extends('backend.admin-master')
@section('site-title')
    {{ __('Travel Page') }}
@endsection
@section('style')
    <x-datatable.css />
    <x-media.css />
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
                            <h4 class="header-title">{{ __('All travel Items') }} </h4>
                            <div class="header-title">
                                <a href="{{ route('admin.travel.new') }}" id="add_post"
                                    class="btn btn-primary mt-4 pr-4 pl-4"> <i class="fas fa-plus mr-1"></i>
                                    {{ __('Add New Travel') }}</a>
                            </div>
                        </div>
                        <x-bulk-action />
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                    <th class="no-sort">
                                        <div class="mark-all-checkbox">
                                            <input type="checkbox" class="all-checkbox">
                                        </div>
                                    </th>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </thead>
                                <tbody>
                                    @foreach ($all_travels as $data)
                                        <tr>
                                            <td><x-bulk-delete-checkbox :id="$data->id" /></td>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->lang->title }}</td>
                                            <td>
                                                <x-delete-popover :url="route('admin.travel.delete', $data->id)" />
                                                <x-edit-icon :url="route('admin.travel.edit', $data->id)" />
                                                {{-- <x-view-icon :url="route('frontend.travel.single', [
                                                    'slug' => $data->lang->slug,
                                                    'id' => $data->id,
                                                ])" /> --}}
                                            </td>
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
    <x-datatable.js />
    <x-media.js />
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                <
                x - bulk - action - js: url = "route('admin.travel.bulk.action')" / >
            });
        })(jQuery)
    </script>
@endsection
