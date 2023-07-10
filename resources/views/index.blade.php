@extends('template.main')
@section('title', 'Trang chủ')
@section('content')

    <style>
        .trend-bottom-img img {
            max-width: 240px;
            height: 160px;
            object-fit: cover;
        }

        @media screen and (max-width: 992px) {
            .trend-bottom-img img {
                max-width: 240px;
                height: 160px;
                object-fit: cover;
            }
        }

        @media screen and (max-width: 600px) {
            .trend-bottom-img img {
                max-width: 100vw;
                max-height: auto;
                object-fit: cover;
            }
        }
    </style>
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <a href="{{ $baivietmoi[0]->slug . '-post-' . $baivietmoi[0]->id }}"
                                    title="{{ $baivietmoi[0]->tieude }}"><img
                                        src="{{ asset('storage/' . $baivietmoi[0]->anh) }}" alt=""
                                        style="max-width: 750px; max-height: 400px; object-fit: cover;"></a>
                                <div class="trend-top-cap">
                                    <span>{{ $baivietmoi[0]->chuyenmuc->tendanhmuc }}</span>
                                    <h2><a href="{{ $baivietmoi[0]->slug . '-post-' . $baivietmoi[0]->id }}"
                                            title="{{ $baivietmoi[0]->tieude }}">{{ $baivietmoi[0]->tieude }}</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @for ($i = 6; $i <= 8; $i++)
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <a href="{{ $baivietmoi[$i]->slug . '-post-' . $baivietmoi[$i]->id }}"
                                                    title="{{ $baivietmoi[$i]->tieude }}"> <img
                                                        src="{{ asset('storage/' . $baivietmoi[$i]->anh) }}" alt=""
                                                        style=""></a>
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">{{ $baivietmoi[$i]->chuyenmuc->tendanhmuc }}</span>
                                                <h4><a href="{{ $baivietmoi[$i]->slug . '-post-' . $baivietmoi[$i]->id }}"
                                                        title="{{ $baivietmoi[$i]->tieude }}">{{ $baivietmoi[$i]->tieude }}
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <a href="{{ $baivietmoi[$i]->slug . '-post-' . $baivietmoi[$i]->id }}"
                                        title="{{ $baivietmoi[$i]->tieude }}">
                                        <img src="{{ asset('storage/' . $baivietmoi[$i]->anh) }}" alt=""
                                            style="width: 120px; height: 100px; object-fit: cover;"></a>
                                </div>
                                <div class="trand-right-cap">
                                    <span
                                        class="color{{ $i }}">{{ isset($baivietmoi[$i]->chuyenmuc->tendanhmuc) ? $baivietmoi[$i]->chuyenmuc->tendanhmuc : 'Chưa phân loại' }}</span>
                                    <h4><a href="{{ $baivietmoi[$i]->slug . '-post-' . $baivietmoi[$i]->id }}"
                                            title="{{ $baivietmoi[$i]->tieude }}">{{ $baivietmoi[$i]->tieude }}</a>
                                    </h4>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3><a href="{{ $danhmuc[4]->slug }}">{{ ucwords($danhmuc[4]->tendanhmuc) }}</a></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">

                            @foreach ($danhmuc[4]->baiviets->sortByDesc('created_at')->where('trangthai', '=', '1')->take(10) as $item)
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset('storage/' . $item->anh) }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">{{ $danhmuc[4]->tendanhmuc }}</span>
                                        <p><?php setlocale(LC_ALL, 'vi');
                                        \Carbon\Carbon::setLocale('vi');
                                        \Carbon\Carbon::setUtf8(true); ?>{{ $item->created_at->formatLocalized('%d %b %Y') }}</p>
                                        <h4><a href="{{ $item->slug . '-post-' . $item->id }}">{{ $item->tieude }}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area  weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Tin nổi bật trong tuần</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img src="assets/img/news/weekly2News1.jpg" alt="">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">Corporate</span>
                                    <p>25 Jan 2020</p>
                                    <h4><a href="#">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img src="assets/img/news/weekly2News2.jpg" alt="">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">Event night</span>
                                    <p>25 Jan 2020</p>
                                    <h4><a href="#">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img src="assets/img/news/weekly2News3.jpg" alt="">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">Corporate</span>
                                    <p>25 Jan 2020</p>
                                    <h4><a href="#">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img src="assets/img/news/weekly2News4.jpg" alt="">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">Event time</span>
                                    <p>25 Jan 2020</p>
                                    <h4><a href="#">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img src="assets/img/news/weekly2News4.jpg" alt="">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">Corporate</span>
                                    <p>25 Jan 2020</p>
                                    <h4><a href="#">Welcome To The Best Model Winner
                                            Contest</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->




@endsection
