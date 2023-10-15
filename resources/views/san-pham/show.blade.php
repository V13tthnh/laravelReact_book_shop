@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thông tin sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('san-pham.index')}}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Mô tả</th>
                            <th>Đơn giá</th>
                            <th>Loại sản phẩm(id)</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$san_pham->id}}</td>
                                <td>
                                @foreach($anh_sp as $item)
                                <img src="{{asset('/'.$item->url)}}" alt="" style="height:100px;width:100px;margin-top:10px"> <br>
                                @endforeach
                                </td>
                                <td>{{$san_pham->ten}}</td>
                                <td>{{$san_pham->so_luong}}</td>
                                <td>{{$san_pham->mo_ta}}</td>
                                <td>{{$san_pham->gia_ban}}</td>
                                <td>{{$san_pham->loai_san_phams->ten}}</td>
                                <td>{{$san_pham->trang_thai}}</td>
                                <td>
                                    <form action="{{route('san-pham.destroy', $san_pham->id)}}" method="POST">
                                        <a href="{{route('san-pham.edit', $san_pham->id)}}" class="btn btn-info">Sửa</a>
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