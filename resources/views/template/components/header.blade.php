<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
               <div class="container">
                   <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li><img src="assets/img/icon/header_icon1.png" alt="">{{ucwords(now()->locale('vi_VN')->isoFormat('dddd, Do MMMM YYYY'))}}</li>
                                </ul>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
            <div class="header-mid d-none d-md-block">
               <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="/"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="assets/img/hero/header_card.jpg" alt="">
                            </div>
                        </div>
                    </div>
               </div>
            </div>
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="/"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block mr-0">
                                <nav>                  
                                    <ul id="navigation">    
                                        <li><a href="/">Trang chủ</a></li>
                                        @for ($i = 0; $i < 6; $i++)
                                        <li><a href="{{$danhmuc[$i]->slug}}">{{ucwords($danhmuc[$i]->tendanhmuc)}}</a></li>
                                        @endfor
                                        <li><a href="#">Chủ đề khác</a>
                                            <ul class="submenu">
                                                @for ($i = 6; $i < count($danhmuc); $i++)
                                        <li><a href="{{$danhmuc[$i]->slug}}">{{ucwords($danhmuc[$i]->tendanhmuc)}}</a></li>
                                        @endfor
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>             
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>