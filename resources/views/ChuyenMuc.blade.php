@extends('template.main')
@section('title', ucwords($check->tendanhmuc) . ' - PL News - Tin tức mới nhất')
@section('content')
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h2 class="h2">{{ ucwords($check->tendanhmuc) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach ($data as $item)
                                                <div class="media post_item d-flex mt-2">

                                                    <div class="trand-right-img w-25 mr-2">
                                                        <a href="{{ '/' . $item->slug . '-post-' . $item->id }}"> <img
                                                                src="assets/img/{{ $item->anh }}" alt=""
                                                                class="img-fuild w-100"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><a href="{{ '/' . $item->slug . '-post-' . $item->id }}"
                                                                class="post-link h4">{{ $item->tieude }}</a>
                                                        </h4>
                                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                                            Laudantium, praesentium, vel consequuntur eos amet obcaecati
                                                            quas incidunt, nisi earum aliquam facere! Animi debitis, cum
                                                            quam molestiae ratione repudiandae in laudantium.
                                                        </p>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <!-- New Poster -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="assets/img/news/news_card.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->


    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        {{ $data->onEachSide(1)->links() }}
                        {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="flaticon-arrow right-arrow"></span></a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
