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
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Tác giả</th>
                                <th>Chuyên mục</th>
                                <th>Trạng thái</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection