@extends('AdminPage.template.main')

@section('title', 'Thêm bài viết')
@section('plugins')

    <link rel="stylesheet" href="{{ url('') }}/AdminPage/js/sweetalert2/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ url('') }}/AdminPage/js/sweetalert2/sweetalert2.all.min.js"></script>

@endsection
@section('content')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 1000px;
        }

        .container {
            margin-top: 20px;
        }

        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .image-preview-input-title {
            margin-left: 2px;
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
                    <form action="{{ route('baiviet.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group">
                                    <strong>Nội dung:</strong>
                                    <textarea name="noidung" id="noidung"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group" class="form-control">
                                    <strong>Tiêu đề:</strong>
                                    <input type="text" name="tieude" class="form-control" placeholder="Tiêu đề"
                                        maxlength="150" required>
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
                                    {{-- <input type="file" name="anh" class="form-control"
                                        accept="image/png, image/jpeg"> --}}

                                </div>

                                <div class="form-group">
                                    <strong>Tóm tắt:</strong>
                                    <input type="text" name="tomtat" class="form-control" placeholder="Tóm tắt"
                                        required>
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
        function modal() {
            var form = new FormData();
            let text = myEditor.getData();
            form.append('text', text);
            swal.showLoading();
            axios.post('/predict', form).then(function(response) {
                    console.log(response.data);
                    Swal.fire({
                        title: 'Kết quả phân tích',
                        text: response.data,
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    })
                })
                .catch(function(error) {
                    Swal.fire({
                        title: 'Lỗi',
                        text: error,
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    })
                    console.log(error);
                });
        }
    </script>

    <script>
        var myEditor = ClassicEditor.create(
            document.querySelector('#noidung'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            }).then(editor => {
            myEditor = editor;
        })
    </script>

@endsection
@section('script')
    <script>
        $(document).on('click', '#close-preview', function() {
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function() {
                    $('.image-preview').popover('show');
                },
                function() {
                    $('.image-preview').popover('hide');
                }
            );
        });

        $(function() {
            // Create the close button
            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class", "close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
                content: "There's no image",
                placement: 'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function() {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function() {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function(e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
