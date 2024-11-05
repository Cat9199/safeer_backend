<!-- User Profile Dropdown -->
<div class="user-profile pull-right">
      @php
      $user = auth()->guard('admin')->user(); // Make sure you're using the correct guard
      @endphp
      {!! render_image_markup_by_attachment_id($user->image, 'avatar user-thumb') !!}
      <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
            {{ $user->name }} <i class="fa fa-angle-down"></i>
      </h4>
      <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('admin.profile.update') }}">{{ __('Edit Profile') }}</a>
            <a class="dropdown-item" href="{{ route('admin.password.change') }}">{{ __('Password Change') }}</a>
            <a class="dropdown-item" href="{{ route('admin.logout') }}">{{ __('Logout') }}</a>
      </div>
</div>