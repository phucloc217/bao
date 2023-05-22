@extends('AdminPage.template.main')

@section('title', 'Thông tin cá nhân')

@section('content')
    
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="row">
            <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">Thông tin cá nhân</h4>
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
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <strong>Tên người dùng:</strong>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Tên người dùng" value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <strong>Ngày sinh:</strong>
                                        <input type="date" name="ngaysinh" id="ngaysinh" class="form-control"
                                            placeholder="Ngày sinh" value="{{ $data->ngaysinh }}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    value="{{ $data->email }}">
                            </div>

                            <div class="form-group mt-5">
                                <button class="btn btn-success" type="submit">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd m-0">
                    <h4 class="c-grey-900">Đổi mật khẩu</h4>
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
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <strong>Mật khẩu cũ:</strong>
                                        <input type="password" name="name" id="name" class="form-control"
                                            placeholder="Mật khẩu cũ" >
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <strong>Mật khẩu mới:</strong>
                                        <input type="password" name="ngaysinh" id="ngaysinh" class="form-control"
                                            placeholder="Mật khẩu mới">
                                    </div>
                                </div>
                            </div>          
                            <div class="form-group mt-4">
                                <button class="btn btn-success" type="submit">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd mt-3">
                <h4 class="c-grey-900">Các bài viết</h4>

                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Tác giả</th>
                            <th>Chuyên mục</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Tác giả</th>
                            <th>Chuyên mục</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($baiviet as $index => $item)
                            <tr>
                                <td>{{ (int) $index + 1 }}</td>
                                <td> <a href="{{ '/' . $item->slug . '-post-' . $item->id }}"
                                        class="p-0 text-dark">{{ $item->tieude }} </a>
                                </td>
                                <td>

                                    @isset($item->user->name)
                                        {{ $item->user->name }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($item->chuyenmuc->tendanhmuc)
                                        {{ $item->chuyenmuc->tendanhmuc }}
                                    @endisset
                                </td>
                                <td>{{ $item->trangthai }}</td>
                                <td>
                                    @if (auth()->user()->can('edit post') ||
                                            auth()->user()->hasRole('admin'))
                                        <a href="{{ route('baiviet.edit', $item->id) }}"
                                            class="btn btn-warning text-light"><i class="ti-pencil"></i> </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ url('') }}/ckeditor/ckeditor.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script> --}}

@endsection
