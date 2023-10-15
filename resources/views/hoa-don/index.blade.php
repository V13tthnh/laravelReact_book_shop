@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h3>Danh sách Đơn nhập</h3>
                    </div>
                    <div class="col-md-3">
                        <a href="{{route('nhap-hang')}}" class="btn btn-primary">Thêm mới</a>
                        <a href="" class="btn btn-danger">Đã xóa</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người lập</th>
                            <th>Nhà cung cấp</th>
                            <th>Tổng tiền</th>
                            <th>Ngày lập</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hoa_don_nhap as $item)
                        <tr>
                            <td>{{$item->id}}</td>  
                            <td>{{$item->admins->ten}}</td>
                            <td>{{$item->nha_cung_caps->ten}}</td>
                            <td>{{$item->thanh_tien}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <form action="" method="POST">
                                    <a href="{{route('chi-tiet-don-nhap', $item->id)}}" data-toggle="tooltip" data-placement="top" title="Chi tiết" class="btn btn-warning"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></i></a>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Sửa" class="btn btn-info"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
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
                     
            </div>
        </div>
    </div>
@endsection