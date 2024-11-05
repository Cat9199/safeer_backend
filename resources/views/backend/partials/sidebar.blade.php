<div class="sidebar-menu">
    <div class="sidebar-header" style="background: #666">
        <div class="logo">
            <a href="/admin-home">
                @if (get_static_option('site_admin_dark_mode') == 'on')
                {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                @else
                {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
                @endif
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <!-- Dashboard -->
                    <li class="{{ active_menu('admin-home') }}">
                        <a href="/admin-home" aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>@lang('Dashboard')</span>
                        </a>
                    </li>
                    <li class="main_dropdown @if(request()->is('admin-home/product-management/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-package"></i>
                            <span>{{ __('Product Management') }}</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/product-management/edit') }}">
                                <a href="{{ route('admin.products.all') }}">{{ __('All Products') }}</a>
                            </li>
                            <li class="{{ active_menu('admin-home/product-management/new') }}"><a
                                    href="{{ route('admin.products.new') }}">{{ __('Add New
                                    Product') }}</a></li>
                            {{-- /admin-home/products/category --}}
                            <li class="{{ active_menu('admin-home/product-management/category') }}"><a
                                    href="{{ route('admin.products.category.all') }}">{{ __('Product
                                    Category') }}</a></li>

                        </ul>
                    </li>
                    {{-- ADMINS AND ROULS --}}
                    <li class="main_dropdown @if(request()->is('admin-home/admin-management/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-user"></i>
                            <span>{{ __('Admin Management') }}</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/admin-management/all') }}"><a
                                    href="/admin-home/all-user">{{ __('All Admins') }}</a></li>
                            <li class="{{ active_menu('admin-home/admin-management/new') }}"><a
                                    href="/admin-home/new-user">{{ __('Add New
                                    Admin') }}</a></li>

                        </ul>
                        <!-- Settings -->
                    <li class="main_dropdown @if(request()->is('admin-home/settings/*')) active @endif">
                        <a href="/admin-home/g/settings" aria-expanded="true">
                            <i class="ti-settings"></i>
                            <span>{{ __('Store Settings') }}</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>