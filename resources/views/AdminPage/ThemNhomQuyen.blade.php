@extends('AdminPage.template.main')

@section('title', 'Nhóm quyền mới')

@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-12"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Thêm nhóm quyền</h4>
                <div class="mT-30">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

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
                    <form action="/admin/nhomquyen" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <strong> Tên nhóm quyền</strong>
                                <input type="text" class="form-control mt-2" id="name" name="name" >
                            </div>
                        </div>


                        <table id="" class="table table-striped table-bordered mt-3" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Tên quyền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên quyền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($permissions as $index => $item)
                                    <tr>
                                        <td>{{ ucwords($item->name) }}</td>
                                        <td>
                                            <input type="checkbox" value="{{ $item->name }}" name="permissions[]"
                                                id="">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
