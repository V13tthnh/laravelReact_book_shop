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
                        <h3>Thêm loại sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('loai-san-pham.index')}}" class="btn btn-primary float-end">Danh sách loại sản phẩm</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('loai-san-pham.store')}}" method="POST">
                       @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên</strong>
                                    <input type="text" name="ten" class="form-control" placeholder="Nhập tên loại sản phẩm">
                                </div>
                                <div class="form-group">
                                    <strong>Mô tả</strong>
                                    <textarea name="mo_ta" id="" cols="30" rows="10" class="form-control"></textarea>
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