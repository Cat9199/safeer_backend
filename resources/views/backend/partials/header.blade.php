<!-- Header Navigation and Search Button -->
<div class="col-md-6 col-sm-8 d-flex align-items-center">
      <div class="nav-btn">
            <span></span>
            <span></span>
            <span></span>
      </div>
</div>
<!-- Profile Info & Task Notification -->
<div class="col-md-6 col-sm-4 d-flex justify-content-end align-items-center">
      <ul class="notification-area list-inline mb-0">
            <li class="list-inline-item" id="full-view"><i class="ti-fullscreen"></i></li>
            <li class="list-inline-item" id="full-view-exit"><i class="ti-zoom-out"></i></li>
            <li class="list-inline-item">
                  <a class="btn @if(get_static_option('site_admin_dark_mode') == 'off') btn-primary @else btn-dark @endif"
                        target="_blank" href="{{ url('/') }}">
                        <i class="fas fa-external-link-alt mr-1"></i>
                        {{ __('View Site') }}
                  </a>
            </li>
      </ul>
</div>