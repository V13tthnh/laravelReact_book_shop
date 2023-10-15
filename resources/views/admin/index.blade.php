@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Danh sách nhân viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('admin.create')}}" class="btn btn-primary">Thêm mới</a>
                        <a href="" class="btn btn-danger">Đã xóa</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Quyền</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nhan_vien as $item)
                        <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->ten}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->quyen}}</td>
                                <td>
                                    <form action="" method="POST">
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Chi tiết" class="btn btn-warning"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></i></a>
                                        <a href="{{route('admin.edit', $item->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa" class="btn btn-info"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                    </form>
                                </td>
                        @empty
                                <td colspan=5><p>Không có dữ liệu</p></td>
                        </tr>
                        @endforelse       
                    </tbody>
                </table>
                     
            </div>
        </div>
    </div>
@endsection