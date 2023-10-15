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
                        <a href="{{route('san-pham.create')}}" class="btn btn-primary">Thêm mới</a>
                        <a href="{{route('product_trash')}}" class="btn btn-danger">Đã xóa</a>
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
                        @forelse($san_pham as $item)
                        <tr>
                                <td>{{$item->id}}</td> 
                                <td>
                                    @forelse($ds_hinh_anh as $ha)
                                        @if($item->id == $ha->san_phams_id)
                                        <img src="{{asset('/'.$ha->url)}}" alt="" style="height:100px;width:100px;margin-top:10px"><br>
                                        @endif
                                    @empty
                                        Không có hình ảnh
                                    @endforelse
                                </td>
                                <td>{{$item->ten}}</td> 
                                <td>{{$item->mo_ta}}</td> 
                                <td>{{$item->so_luong}}</td> 
                                <td>{{$item->gia_ban}}</td>
                                <td>{{$item->loai_san_phams->ten}}</td>
                                <td>
                                    <form action="{{route('san-pham.destroy', $item->id)}}" method="POST">
                                        <a href="{{route('san-pham.show', $item->id)}}" data-toggle="tooltip" data-placement="top" title="Chi tiết" class="btn btn-warning"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></i></a>
                                        <a href="{{route('san-pham.edit', $item->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa" class="btn btn-info"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                    </form>
                                </td>
                            @empty
                                <td colspan=3><p>Không có dữ liệu</p></td>
                        </tr>
                            @endforelse
                    </tbody>
                </table>
                {{$san_pham->links()}}
            </div>
        </div>
    </div>
@endsection