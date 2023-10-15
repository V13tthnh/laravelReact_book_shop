@extends('layout')

@section('content')
    @if(session('thongbaonhanvien'))
    <div class="alert alert-danger">
        {{session('thongbaonhanvien')}}
    </div>
    @endif
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Sửa loại sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('loai-san-pham.index')}}" class="btn btn-primary float-end">Danh sách loại sản phẩm</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('loai-san-pham.update', $loai_san_pham->id)}}" method="POST">
                       @csrf
                       @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên</strong>
                                    <input type="text" name="ten" value="{{$loai_san_pham->ten}}" class="form-control" placeholder="Nhập họ tên">
                                </div>
                                <div class="form-group">
                                    <strong>Mô tả</strong>
                                    <textarea name="mo_ta" id="" cols="30" rows="10" class="form-control">{{$loai_san_pham->mo_ta}}</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection