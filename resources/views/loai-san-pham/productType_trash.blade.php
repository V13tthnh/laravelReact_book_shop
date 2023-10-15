@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Danh sách loại sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('loai-san-pham.index')}}" class="btn btn-primary">Danh sách loại sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prodType_trash as $item)
                        <tr>
                                <td>{{$item->id}}</td>  
                                <td>{{$item->ten}}</td>
                                <td>{{$item->mo_ta}}</td>
                                <td>
                                    <a href="{{route('loai-san-pham.untrash', $item->id)}}" class="btn btn-info">Khôi phục</a>
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