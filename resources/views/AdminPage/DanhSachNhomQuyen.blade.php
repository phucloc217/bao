@extends('AdminPage.template.main')

@section('title', 'Cài đặt nhóm quyền')

@section('content')
    <link rel="stylesheet" href="{{ url('') }}/AdminPage/js/sweetalert2/sweetalert2.min.css">
    <script src="{{ url('') }}/AdminPage/js/sweetalert2/sweetalert2.all.min.js"></script>
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Cài đặt nhóm quyền</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="c-grey-900 mB-20">Danh sách nhóm quyền</h4>
                        </div>
                        <div class="col-6 text-right">
                           <a href="/admin/nhomquyen/create" class="btn btn-primary btn-md">Thêm</a>
                            
                        </div>
                    </div>

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
                                <th>Tên nhóm quyền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên nhóm quyền</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($role as $index => $item)
                                @if ($item->name != 'admin')
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ ucwords($item->name) }}</td>
                                        <td>
                                            <a href="{{ route('nhomquyen.edit',$item->name)}}"
                                                class="btn btn-warning text-light"><i class="ti-pencil"></i> </a>

                                            <button class="btn btn-danger text-light"
                                                onclick="modalDelete({{ $item->id }})"><i class="ti-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endif
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
                window.location.replace("/admin/nhomquyenz/delete/" + id);
            })
        }
    </script>
@endsection
