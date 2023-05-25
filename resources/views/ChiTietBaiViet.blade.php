@extends('template.main')
@section('title', ucwords($data->tieude) . ' - PL News - Tin tức mới nhất')
@section('content')
<style>
.about-prea img{
    height: auto; max-width: 100%;
}
</style>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90">
                       
                        <div class="section-tittle mb-30 pt-30">
                            <h1>{{ $data->tieude }}</h1>
                                <p class="font-italic">Ngày đăng: {{date_format($data->created_at,'d/m/Y')}}</p>
                        </div>
                        
                        <div class="about-prea">
                           {!!$data->noidung!!}
                        </div>
                        
                    </div>
                   
                </div>
                <div class="col-lg-4">
                    <!-- Section Tittle -->
                    
                    <!-- New Poster -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="assets/img/news/news_card.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About US End -->
@endsection
