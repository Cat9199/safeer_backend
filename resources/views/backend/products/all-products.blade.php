@extends('backend.admin-master')
@section('site-title')
{{ __('All Products') }}
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-wrapp">
                        <h4 class="header-title">{{ __('All Products') }} </h4>
                        <div class="header-title">
                            <a href="{{ route('admin.products.new') }}" class="btn btn-primary mt-4 pr-4 pl-4">{{
                                __('Add
                                New Products') }}</a>
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
                                <th>{{ __('Image') }}</th>

                                <th>{{ __('Category') }}</th>

                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($all_products as $data)
                                <tr class="{{ $data['id'] }}">
                                    <td>
                                        <div class="bulk-checkbox-wrapper">
                                            <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]"
                                                value="{{ $data->id }}">
                                        </div>
                                    </td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->lang->title }}</td>
                                    <td>
                                        <div class="img-wrap">
                                            @php
                                            $event_img = get_attachment_image_by_id(
                                            $data->image,
                                            'thumbnail',
                                            true,
                                            );
                                            @endphp
                                            @if (!empty($event_img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{ $event_img['img_url'] }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </td>


                                    <td>{{ $data->category ? $data->category->lang->name : __('Anonymous') }}</td>

                                    <td>
                                        <x-status-span :status="$data->status" />
                                    </td>
                                    <td>
                                        <x-delete-popover :url="route('admin.products.delete', $data->id)" />
                                        <x-edit-icon :url="route('admin.products.edit', $data->id)" />

                                        <a href="{{ route('download.qr', ['id' => $data->id]) }}"
                                            class="btn btn-dark btn-xs mb-3" download>
                                            <i class="fa fa-qrcode"></i>
                                        </a>
                                        {{-- color controller --}}
                                        <a href="/admin-home/products/color/{{ $data->id }}"
                                            class="btn btn-dark btn-xs mb-3">
                                            <i class="fa fa-paint-brush"></i>
                                        </a>
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
                x - bulk - action - js: url = "route('admin.products.bulk.action')" / >
            });
        })(jQuery);
</script>
<script>
    $(document).ready(function() {
            $('#bulk_action_btn').on('click', function(e) {
                e.preventDefault();
                var bulkOption = $('#bulk_option').val();
                var allVals = $('.bulk-checkbox:checked').map(function() {
                    return this.value;
                }).get();

                if (bulkOption === 'download_qr') {
                    $.ajax({
                        url: "{{ route('admin.products.bulk.download.qr') }}",
                        type: "POST",
                        data: {
                            bulk_delete: allVals,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.file) {
                                window.location.href = response.file; // Trigger download
                            } else {
                                alert(response.error || 'Unknown error occurred');
                            }
                        },
                        error: function(xhr) {
                            alert('Error: ' + xhr.responseText);
                        }
                    });
                }
            });
        });
</script>
@endsection