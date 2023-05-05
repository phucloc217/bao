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
                    <div class="form-group">
                        <strong>Tiêu đề:</strong>
                        <input type="text" name="tieude" class="form-control" placeholder="Tiêu đề">
                    </div>
                    <div class="form-group">
                        <strong>Chuyên mục:</strong>
                        <select name="chuyenmuc" id="chuyenmuc" class="form-control">
                            @foreach ($chuyenmuc as $item)
                                <option value="{{$item->id}}">{{ucwords($item->tendanhmuc)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Nội dung:</strong>
                        <textarea name="editor" id="editor"></textarea>
                    </div>

                    <div class="form-group mt-5">
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('') }}/ckeditor/ckeditor.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script> --}}
    <script>
        ClassicEditor
            .create(
                document.querySelector('#editor'), {
                    ckfinder: {
                        uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                    }
                }
            )
            .catch(error => {

            });
    </script>
@endsection
