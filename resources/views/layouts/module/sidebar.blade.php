<!-- Main sidebar -->
<div class="page-content pt-0">
    <div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            <span class="font-weight-semibold">Main sidebar</span>
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user-material">
                {{-- Avatar SideBar --}}
                <div class="sidebar-user-material-body card-img-top">
                    <div class="card-body text-center">
                        <a href="#">
                            <img src="{{ asset('admin/assets/img/avatars/6.jpg') }}"
                                class="img-fluid rounded-circle shadow-2 mb-3" width="80" height="80" alt="">
                        </a>
                        <h4 class="mb-0 text-white text-shadow-dark"><strong>{{ auth()->user()->name }}</strong></h4>
                        <span class="font-size-sm text-white text-shadow-dark">{{ auth()->user()->sector->name }}, ({{ auth()->user()->sector->code }})                        </span>
                    </div>

                    <div class="sidebar-user-material-footer">
                        <a href="#user-nav"
                            class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle"
                            data-toggle="collapse"><span>Akun Saya</span></a>
                    </div>
                </div>
                {{-- END Avatar SideBar --}}

                {{-- My Account Dropdown --}}
                <div class="collapse" id="user-nav">
                    <ul class="nav nav-sidebar">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-user-plus"></i>
                                <span>My profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="icon-switch2"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- END My Account Dropdown --}}
            </div>
            <!-- /user menu -->


            <!-- Navigation -->
            <div class="card card-sidebar-mobile">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Navigation</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Management -->
                        <li class="nav-item-header pt-0 mt-0">
                            <div class="text-uppercase font-size-xs line-height-xs">Managemen</div> <i class="icon-menu"
                                title="Managemen"></i>
                        </li>

                        {{-- Dashboard --}}
                        <li class="nav-item">
                            <a href="index.html" class="nav-link active">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                    <span class="d-block font-weight-normal opacity-50">No active orders</span>
                                </span>
                            </a>
                        </li>
                        {{-- END Dashboard --}}

                        {{-- Product --}}
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link"><i class="icon-copy"></i>
                                <span>Produk</span></a>
                        </li>
                        {{-- END Product --}}

                        {{-- Category --}}
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link"><i class="icon-copy"></i>
                                <span>Kategori</span></a>
                        </li>
                        {{-- END Category --}}

                        <!-- /Management -->

                        <!-- Order -->
                        <li class="nav-item-header pt-0 mt-0">
                            <div class="text-uppercase font-size-xs line-height-xs">Pesanan</div> <i class="icon-menu"
                                title="Order"></i>
                        </li>
                        {{-- Order --}}
                        <li class="nav-item">
                            <a href="/order" class="nav-link"><i class="icon-copy"></i> <span>Data Pesanan</span></a>
                        </li>
                        {{-- END Order --}}
                        <!-- /Order -->

                        <!-- Delivery -->
                        <li class="nav-item-header pt-0 mt-0">
                            <div class="text-uppercase font-size-xs line-height-xs">Pengiriman</div> <i
                                class="icon-menu" title="Delivery"></i>
                        </li>
                        {{-- Delivery --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Data Pengiriman</span></a>
                        </li>
                        {{-- END Delivery --}}

                        {{-- Courir --}}
                        <li class="nav-item">
                            <a href="{{ route('courir.index') }}" class="nav-link"><i class="icon-copy"></i> <span>Data
                                    Kurir</span></a>
                        </li>
                        {{-- END Courir --}}
                        <!-- /Delivery -->

                        <!-- Customer -->
                        <li class="nav-item-header pt-0 mt-0">
                            <div class="text-uppercase font-size-xs line-height-xs">Pelanggan</div> <i class="icon-menu"
                                title="Customer"></i>
                        </li>
                        {{-- Customer --}}
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}" class="nav-link"><i class="icon-copy"></i>
                                <span>Pelanggan</span></a>
                        </li>
                        {{-- END Customer --}}
                        <!-- /Customer -->

                        <!-- Sector -->
                        <li class="nav-item-header pt-0 mt-0">
                            <div class="text-uppercase font-size-xs line-height-xs">Sektor</div> <i class="icon-menu"
                                title="Sector"></i>
                        </li>
                        {{-- Sector --}}
                        <li class="nav-item">
                            <a href="{{ route('sector.index') }}" class="nav-link"><i class="icon-copy"></i>
                                <span>Sektor</span></a>
                        </li>
                        {{-- END Sector --}}
                        <!-- /Sector -->

                    </ul>
                </div>
            </div>
            <!-- /navigation -->

        </div>
        <!-- /sidebar content -->

    </div>
</div>
<!-- /main sidebar -->