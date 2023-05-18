@extends('AdminPage.template.sign')

@section('title', 'Đăng Nhập')

@section('content')
    <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
        style="background-image:url(/AdminPage/images/bg.jpg)">
        <div class="pos-a centerXY">
            <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px"><img class="pos-a centerXY"
                    src="/AdminPage/images/logo.png" alt=""></div>
        </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
        <h4 class="fw-300 c-grey-900 mB-40">Đăng nhập</h4>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form action="{{ route('postLogin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="text-normal text-dark">Email</label>
                <input type="email" name="email" class="form-control" placeholder="example@example.com">
            </div>
            <div class="form-group">
                <label class="text-normal text-dark">Mật khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
            </div>
            <div class="form-group">
                <div class="peers ai-c jc-sb fxw-nw">
                    <div class="peer">
                        <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                            <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                            <label for="inputCall1" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Lưu
                                    đăng nhập</span></label>
                        </div>
                    </div>
                    <div class="peer">
                        <button class="btn btn-primary">Đăng nhập</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
