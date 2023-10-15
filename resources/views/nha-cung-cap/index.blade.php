@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Danh sách Nhà cung cấp</h3>
                    </div>
                    <div class="col-md-3 btn-group">
                        <a href="{{route('nha-cung-cap.create')}}" class="btn btn-primary">Thêm mới</a>
                        <a href="" class="btn btn-danger">Đã xóa</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã NCC</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Mô tả</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nha_cung_cap as $item)
                        <tr>
                            <td>{{$item->id}}</td>  
                            <td>{{$item->ma_ncc}}</td>
                            <td>{{$item->ten}}</td>
                            <td>{{$item->dia_chi}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->mo_ta}}</td>
                            <td>
                                <form action="" method="POST">
                                    <a href="{{route('nha-cung-cap.show', $item->id)}}" data-toggle="tooltip" data-placement="top" title="Chi tiết" class="btn btn-warning"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></i></a>
                                    <a href="{{route('nha-cung-cap.edit', $item->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa" class="btn btn-info"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                </form>
                            </td>
                        @empty
                                <td colspan=4><p>Không có dữ liệu</p></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$nha_cung_cap->links()}}
            </div>
        </div>
    </div>
@endsection