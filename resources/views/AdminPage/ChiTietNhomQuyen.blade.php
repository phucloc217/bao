@extends('AdminPage.template.main')

@section('title', "Nhóm quyền $role->name")

@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-12"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Cài đặt nhóm quyền {{ucwords($role->name)}}</h4>
                <div class="mT-30">
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
                    <form action="/admin/nhomquyen/{{$role->name}}" method="post">
                        @csrf
                        @method('patch')
                    <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                        <input type="checkbox" value="{{$item->name}}" name="permissions[]" id=""  @if (in_array($item->name, $RolePermissions)) {{ 'checked' }} @endif>
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
