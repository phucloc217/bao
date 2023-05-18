<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="/">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img src="assets/static/images/logo.png" alt=""></div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">Quản lý</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i
                                class="ti-arrow-circle-left"></i></a></div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 actived"><a class="sidebar-link" href="/admin"><span class="icon-holder"><i
                            class="c-blue-500 ti-home"></i> </span><span class="title">Thống
                        kê</span></a></li>
            @if (auth()->user()->hasAnyPermission(['view category', 'create category']))
                <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span
                            class="icon-holder"><i class="c-green-500 ti-layout-grid2"></i> </span><span
                            class="title">Chuyên mục</span> <span class="arrow"><i
                                class="ti-angle-right"></i></span></a>
                    <ul class="dropdown-menu">
                        @can('view category')
                            <li><a class="sidebar-link" href="{{ route('chuyenmuc.index') }}">Danh sách chuyên mục</a></li>
                        @endcan
                        @can('create category')
                            <li><a class="sidebar-link" href="{{ route('chuyenmuc.create') }}">Thêm chuyên mục</a></li>
                        @endcan

                    </ul>
                </li>
            @endif
            @canany(['view post', 'write post'])
                <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span
                            class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span
                            class="title">Bài viết</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                    <ul class="dropdown-menu">
                        @can('view post')
                            <li><a class="sidebar-link" href="{{ route('baiviet.index') }}">Danh sách bài viết</a></li>
                        @endcan
                        @can('write post')
                            <li><a class="sidebar-link" href="{{ route('baiviet.create') }}">Thêm bài viết</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['view users', 'create user'])
                <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span
                            class="icon-holder"><i class="c-red-500 ti-user"></i> </span><span class="title">Tác giả</span>
                        <span class="arrow"><i class="ti-angle-right"></i></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="sidebar-link" href="{{ route('baiviet.index') }}">Danh sách tác giả</a></li>
                        <li><a class="sidebar-link" href="{{ route('baiviet.create') }}">Thêm tác giả</a></li>
                    </ul>
                </li>
            @endcanany
            @can('change setting')
                <li class="nav-item">
                    <a class="sidebar-link" href="/admin/thongke">
                        <span class="icon-holder">
                            <i class="c-purple-500 ti-settings"></i>
                        </span>
                        <span class="title">Cài đặt</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
