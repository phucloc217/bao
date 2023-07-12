@extends('AdminPage.template.main')

@section('title', 'Cập nhật bài viết')

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
                <h6 class="c-grey-900">Cập nhật bài viết</h6>
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
                    <form action="{{ route('baiviet.update',$baiviet->id) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group">
                                    <strong>Nội dung:</strong>
                                    <textarea name="noidung" id="noidung">{{$baiviet->noidung}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group" class="form-control">
                                    <strong>Tiêu đề:</strong>
                                    <input type="text" name="tieude" class="form-control" placeholder="Tiêu đề"
                                        maxlength="150"  value="{{$baiviet->tieude}}" required>
                                </div>

                                <div class="form-group">
                                    <strong>Chuyên mục:</strong>
                                    <select name="chuyenmuc" id="chuyenmuc" class="form-control">
                                        <option value="">Không phân loại</option>
                                        @foreach ($chuyenmuc as $item)
                                          <option value=""@if ($baiviet->danhmuc ==null){{'selected'}} @endif>Chưa phân loại</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <strong>Ảnh thu nhỏ:</strong>
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename"
                                            disabled="disabled" name="anh" accept="image/png, image/jpeg"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear"
                                                style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif"
                                                    name="input-file-preview" /> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <strong>Tóm tắt:</strong>
                                    <input type="text" name="tomtat" class="form-control" placeholder="Tóm tắt"
                                    value="{{$baiviet->tomtat}}"  required>
                                </div>

                                <div class="form-group">
                                    <strong>Đăng ngay:</strong>
                                    <input type="checkbox" name="trangthai" class="" placeholder="Tóm tắt"
                                        value="1" checked>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <button class="btn btn-success" type="submit">Lưu</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="button" onclick="modal()">Phân tích</button>
                                    </div>
                                </div>

                            </div>
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
            CKEDITOR.config.extraPlugins = "imageresize";
    </script>
@endsection
