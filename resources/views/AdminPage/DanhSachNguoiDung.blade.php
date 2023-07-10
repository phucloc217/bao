@extends('AdminPage.template.main')

@section('title', 'Danh sách người dùng')

@section('content')
    <link rel="stylesheet" href="{{ url('') }}/AdminPage/js/sweetalert2/sweetalert2.min.css">
    <script src="{{ url('') }}/AdminPage/js/sweetalert2/sweetalert2.all.min.js"></script>
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Người dùng</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Danh sách người dùng</h4>
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
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ ucwords($item->name) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->trangthai }}</td>
                                    <td>
                                        <a href="{{route('user.edit',$item->id)}}" class="btn btn-warning text-light"><i class="ti-pencil"></i> </a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
