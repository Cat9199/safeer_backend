<div class="modal fade" id="viewImagesModal{{ $color->id }}" tabindex="-1" role="dialog"
      aria-labelledby="viewImagesModalLabel{{ $color->id }}" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="viewImagesModalLabel{{ $color->id }}">Image Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        {{-- add image form --}}
                        <form action="{{ route('colors.add.image') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="color_id" value="{{ $color->id }}">
                              <div class="form-group">
                                    <label for="gallery{{ $color->id }}">{{ __('Add Image') }}</label>
                                    <input type="file" class="form-control-file" id="gallery{{ $color->id }}"
                                          name="gallery[]" multiple>
                                    <small class="form-text text-muted">{{ __('1920 x 1280 pixels (recommended)')
                                          }}</small>
                              </div>
                        </form>
                  </div>
                  <div class="modal-body">
                        <div class="row" id="imageGallery{{ $color->id }}">

                        </div>
                  </div>
            </div>
      </div>
</div>