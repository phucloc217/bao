@extends('AdminPage/template/main')

@section('title','Thống kê')

@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item w-100">
            <div class="row gap-20">
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Tổng số bài viết</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">

                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{$countBaiViet}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Tổng số tác giả</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">

                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{$countTacGia}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
        
       
        
        
        
        
    </div>
@endsection