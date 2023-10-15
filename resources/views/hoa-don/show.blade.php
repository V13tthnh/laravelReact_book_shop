@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h3>Danh sách chi tiết đơn nhập</h3>
                    </div>
                    <div class="col-md-3">
                        <a href="{{route('hoa-don')}}" class="btn btn-primary">Danh sách đơn nhập</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hóa đơn nhập</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá nhập</th>
                            <th>Giá bán</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cthdn as $item)
                        <tr>
                            <td>{{$item->id}}</td>  
                            <td>{{$item->hoa_don_nhaps_id}}</td>
                            <td>{{$item->san_phams->ten}}</td>
                            <td>{{$item->so_luong}}</td>
                            <td>{{$item->gia_nhap}}</td>
                            <td>{{$item->gia_ban}}</td>
                            <td>
                                <form action="" method="POST">
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