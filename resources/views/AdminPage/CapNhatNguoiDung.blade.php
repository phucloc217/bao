@extends('AdminPage.template.main')

@section('title', 'Thêm người dùng')

@section('content')

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Cập nhật người dùng </h4>
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger mt-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mt-3">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('user.update',$data->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <strong>Tên người dùng:</strong>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Tên người dùng" value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <strong>Ngày sinh:</strong>
                                    <input type="date" name="ngaysinh" id="ngaysinh" class="form-control"
                                        placeholder="Ngày sinh" value="{{$data->ngaysinh}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-8 col-sm-12">
                                <strong>Email:</strong>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    value="{{$data->email}}">
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <strong>Nhóm quyền:</strong>
                                <select name="permission" id="" class="form-control">
                                    @foreach ($role as $item)
                                        <option value="{{ $item->name }}" @if ($item->name== $userRole)
                                            selected
                                        @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-5">
                            <button class="btn btn-success" type="submit">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('') }}/ckeditor/ckeditor.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script> --}}

@endsection
