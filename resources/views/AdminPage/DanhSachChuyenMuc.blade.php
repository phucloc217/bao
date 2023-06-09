@extends('AdminPage.template.main')

@section('title', 'Danh sách chuyên mục')

@section('content')
    <link rel="stylesheet" href="{{ url('') }}/AdminPage/js/sweetalert2/sweetalert2.min.css">
    <script src="{{ url('') }}/AdminPage/js/sweetalert2/sweetalert2.all.min.js"></script>
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Chuyên mục</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Danh sách chuyên mục</h4>
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
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Chuyên mục</th>
                                <th>Số lượng bài viết</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Chuyên mục</th>
                                <th>Số lượng bài viết</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ ucwords($item->tendanhmuc) }}</td>
                                    <td>{{ $item->baiviets()->count() }}</td>
                                    <td>
                                        <form action="/admin/chuyenmuc/doitrangthai/{{ $item->id }}" method="get" id="frm-{{$item->id}}">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="trangthai{{ $item->id }}"
                                                    @if ($item->trangthai) {{ 'checked' }} @endif>
                                                <label class="custom-control-label" for="trangthai{{ $item->id }}"
                                                    onclick="changeStatus({{ $item->id }})"></label>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('chuyenmuc.edit', $item->id) }}"
                                            class="btn btn-warning text-light"><i class="ti-pencil"></i> </a>
                                        <button class="btn btn-danger text-light"
                                            onclick="modalDelete({{ $item->id }})"><i class="ti-trash"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function modalDelete(id) {
            Swal.fire({
                title: 'Bạn có chắc muốn xóa không?',
                text: "Sau khi xóa, những bài viết thuộc chuyên mục này sẽ không được xếp vào chuyên mục nào.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Đóng'
            }).then((result) => {
                window.location.replace("/admin/chuyenmuc/delete/" + id);
            })
        }

        function changeStatus(id) {
            document.getElementById("frm-"+id).submit();
        }
    </script>
@endsection
