@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Danh sách sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('san-pham.index')}}" class="btn btn-primary">Danh sách sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th> 
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Loại sản phẩm</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($product_trash as $item)
                        <tr>
                            <td>{{$item->id}}</td> 
                            <td>
                                <img src="" alt="" style="height:100px;width:100px;margin-top:10px"><br>
                            </td>
                            <td>{{$item->ten}}</td> 
                            <td>{{$item->mo_ta}}</td> 
                            <td>{{$item->so_luong}}</td> 
                            <td>{{$item->gia_ban}}</td>
                            <td>{{$item->loai_san_phams->ten}}</td>
                            <td>
                            <a href="{{route('san-pham.untrash', $item->id)}}" class="btn btn-info">Khôi phục</a>
                            </td>
                        @empty
                            <td colspan=3><p>Không có dữ liệu</p></td>
                        </tr>
                        @endforelse 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection