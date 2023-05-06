@extends('AdminPage.template.main')

@section('title', 'Thêm bài viết')

@section('content')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 1000px;
        }
    </style>
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Thêm bài viết</h6>
                <div class="mt-30">
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
                    <form action="{{ route('baiviet.store') }}" method="POST">
                        @csrf
                        <div class="form-group" class="form-control">
                            <strong>Tiêu đề:</strong>
                            <input type="text" name="tieude" class="form-control" placeholder="Tiêu đề" required>
                        </div>

                        <div class="form-group">
                            <strong>Chuyên mục:</strong>
                            <select name="chuyenmuc" id="chuyenmuc" class="form-control">
                                <option value="">Không phân loại</option>
                                @foreach ($chuyenmuc as $item)
                                    <option value="{{ $item->id }}">{{ ucwords($item->tendanhmuc) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Ảnh thu nhỏ:</strong>
                            <input type="file" name="anh" class="form-control" accept="image/png, image/jpeg">
                        </div>

                        <div class="form-group">
                            <strong>Tóm tắt:</strong>
                            <input type="text" name="tomtat" class="form-control" placeholder="Tóm tắt" required>
                        </div>
                        <div class="form-group">
                            <strong>Nội dung:</strong>
                            <textarea name="noidung" id="noidung"></textarea>
                        </div>
                        <div class="form-group">
                            <strong>Đăng ngay:</strong>
                            <input type="checkbox" name="trangthai" class="" placeholder="Tóm tắt" value="1" checked>
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
    <script src="{{ url('') }}/ckeditor/post.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script> --}}
    <script>
        ClassicEditor.create(
                document.querySelector('#noidung'),
                {
                    ckfinder: 
                    {
                        uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                    }
                } )
            .catch(error => {

            });
    </script>
@endsection
