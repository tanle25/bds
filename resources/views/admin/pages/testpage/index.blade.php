@extends('admin.main_layout')
@section('title')
    Danh sách bài đăng khách hàng
@endsection

@section('content')
    @include('admin.partials.content_header', ['title' => 'Quản lý bài đăng khách hàng'])
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Danh sách bài đăng khách hàng</h3>
                <a href="{{route('newpage.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="realty-post-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Trang</th>
                            <th>Slug</th>
                            <th>Mô Tả</th>
                            <th>Nội Dung</th>
                            <th>Ngày gửi</th>
                            <th>Thao tác</th>
                        </tr>
                        @foreach ($page as $p )
                        <tr>
                            <th>{{ $p->id }}</th>
                            <th>{{ $p->name }}</th>
                            <th>{{ $p->slug }}</th>
                            <th>{{ $p->description }}</th>
                            <th>{!!$p->content!!}</th>
                            <th>{{ $p->created_at }}</th>
                            <th>
                                <a style="float: left" href="{{ Route('edit',$p->slug) }}">sửa</a>
                                <a style="float: right" href="{{ Route('delete',$p->slug) }}">xóa</a>

                            </th>


                        </tr>
                        @endforeach
                    </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <img src="" alt="">
    </section>
    @include('admin.components.datatable_resource')

@endsection

