@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thông tin loại sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('loai-san-pham.index')}}" class="btn btn-primary float-end">Danh sách loại sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$loai_san_pham->id}}</a></td>
                                <td>{{$loai_san_pham->ten}}</td>
                                <td>{{$loai_san_pham->mo_ta}}</td>
                                <td>
                                    <form action="" method="POST">
                                        <a href="{{route('loai-san-pham.edit', $loai_san_pham->id)}}" class="btn btn-info">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection