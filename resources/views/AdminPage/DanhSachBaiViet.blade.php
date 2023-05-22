@extends('AdminPage.template.main')

@section('title', 'Danh sách bài viết')

@section('content')
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Bài viết</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Danh sách bài viết</h4>
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
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td> <a href="{{ '/' . $item->slug . '-post-' . $item->id }}" class="p-0 text-dark">{{ $item->tieude }} </a></td>
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
                                        @if (auth()->user()->can('edit post')||auth()->user()->hasRole('admin'))
                                            <a href="{{ route('baiviet.edit', $item->id) }}" class="btn btn-warning text-light"><i class="ti-pencil"></i> </a>
                                        @endif
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
