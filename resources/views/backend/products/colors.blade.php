@extends('backend.admin-master')

@section('site-title')
{{ __('Product Colors Details') }}
@endsection

@section('style')
<x-datatable.css />
@endsection

@section('content')
<div class="col-lg-12 col-ml-12 padding-bottom-30">
      <div class="row">
            <div class="col-lg-6">
                  <div class="card">
                        <div class="card-body">
                              <h4 class="header-title">{{ __('Add New Color') }}</h4>
                              <form action="{{ route('colors.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                          <label for="color_name">{{ __('Color Name') }}</label>
                                          <input type="text" class="form-control" id="color_name" name="color_name"
                                                placeholder="{{ __('Color Name') }}" required>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                                    <div class="form-group">
                                          <label for="color_code">{{ __('Color Code') }}</label>
                                          <input type="color" class="form-control" id="color_code" name="color_code"
                                                required>
                                    </div>
                                    <div class="form-group">
                                          <label for="material">{{ __('Material') }}</label>
                                          <select class="form-control" id="material" name="material" required>
                                                <option value="Matte">{{ __('Matte') }}</option>
                                                <option value="Shiny">{{ __('Shiny') }}</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label for="gallery">{{ __('Gallery') }}</label>
                                          <input type="file" class="form-control-file" id="gallery" name="gallery[]"
                                                multiple>
                                          <small class="form-text text-muted">{{ __('1920 x 1280 pixels (recommended)')
                                                }}</small>
                                    </div>
                                    <div class="form-group text-right">
                                          <button type="submit" class="btn btn-primary">{{ __('Add Color') }}</button>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
            <div class="col-lg-6">
                  <div class="card">
                        <div class="card-body">
                              <h4 class="header-title">{{ __('All Colors') }}</h4>
                              <div class="table-wrap table-responsive">
                                    <table class="table table-default">
                                          <thead>
                                                <th>{{ __('Color Name') }}</th>
                                                <th>{{ __('Color Code') }}</th>
                                                <th>{{ __('Material') }}</th>
                                                <th>{{ __('Actions') }}</th>
                                          </thead>
                                          <tbody>
                                                @foreach($colors as $color)
                                                <tr>
                                                      <td>{{ $color->name }}</td>
                                                      <td style="background-color: {{ $color->hex_code }};"></td>
                                                      <td>{{ $color->material }}</td>
                                                      <td>
                                                            <button class="btn btn-info btn-xs mb-3 mr-1"
                                                                  data-toggle="modal"
                                                                  data-target="#viewImagesModal{{ $color->id }}"
                                                                  onclick="loadImages('{{ $color->image_ids }}', {{ $color->id }})">
                                                                  <i class="ti-image"></i> {{ __('View Images') }}
                                                            </button>
                                                            <button class="btn btn-success btn-xs"
                                                                  onclick="$('#fileUploadModal{{ $color->id }}').modal('show');">
                                                                  <i class="ti-plus"></i>
                                                            </button>
                                                            <form action="{{ route('admin.product.color.delete', $color->id) }}"
                                                                  method="POST" style="display: inline-block;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="submit" class="btn btn-danger btn-xs"
                                                                        onclick="return confirm('Are you sure?')">
                                                                        <i class="ti-trash"></i>
                                                                  </button>
                                                            </form>
                                                      </td>
                                                </tr>
                                                <!-- Modal for Image Gallery -->
                                                <div class="modal fade" id="viewImagesModal{{ $color->id }}"
                                                      tabindex="-1" role="dialog"
                                                      aria-labelledby="viewImagesModalLabel{{ $color->id }}"
                                                      aria-hidden="true">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                  <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                              id="viewImagesModalLabel{{ $color->id }}">
                                                                              {{ __('Image Gallery') }}</h5>
                                                                        <button type="button" class="close"
                                                                              data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                        <div class="row"
                                                                              id="imageGallery{{ $color->id }}"></div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <!-- Modal for Adding New Image -->
                                                <div class="modal fade" id="fileUploadModal{{ $color->id }}"
                                                      tabindex="-1" role="dialog"
                                                      aria-labelledby="fileUploadModalLabel{{ $color->id }}"
                                                      aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                  <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                              id="fileUploadModalLabel{{ $color->id }}">
                                                                              {{ __('Add Image') }}</h5>
                                                                        <button type="button" class="close"
                                                                              data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                        <input type="file"
                                                                              id="fileUpload{{ $color->id }}">
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                              onclick="addImage({{ $color->id }})">Upload
                                                                              Image</button>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
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
<script>
      (function($) {
        "use strict";

        window.loadImages = function(images, colorId) {
            const gallery = document.getElementById('imageGallery' + colorId);
            gallery.innerHTML = '';
            const imageList = JSON.parse(images);
            imageList.forEach(image => {
                const imgElement = `
                  <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                              <img src="/storage/gallery/${image}" class="card-img-top" alt="Image" style="height: 200px; object-fit: cover;">
                              <div class="card-body text-center">
                                    <button class="btn btn-outline-danger btn-sm" onclick="deleteImage('${image}', ${colorId})">
                                          <i class="ti-trash"></i> {{ __('Delete') }}
                                    </button>
                              </div>
                        </div>
                  </div>`;
                gallery.innerHTML += imgElement;
            });
        }

        window.addImage = function(colorId) {
            var formData = new FormData();
            formData.append('image', document.querySelector(`#fileUpload${colorId}`).files[0]);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: `/admin-home/colors/${colorId}/add-image`,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    alert('Image added successfully!');
                        document.location.reload();   
                },
                error: function() {
                    alert('An error occurred while uploading the image.');
                }
            });
        }

        window.deleteImage = function(image, colorId) {
            $.ajax({
                url: `/admin-home/colors/${colorId}/delete-image`,
                type: 'POST',
                data: {
                    image: image,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert('Image deleted successfully!');
                    document.location.reload();
                },
                error: function() {
                    alert('Failed to delete the image.');
                }
            });
        }
    })(jQuery);
</script>
<x-datatable.js />
@endsection