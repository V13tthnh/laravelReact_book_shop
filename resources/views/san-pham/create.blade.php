@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('san-pham.index')}}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('san-pham.store')}}" method="POST" enctype="multipart/form-data" >
                       @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên</strong>
                                    <input type="text" name="ten" class="form-control" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <strong>SKU</strong>
                                    <input type="text" name="SKU" class="form-control" placeholder="Nhập mã vạch">
                                </div>
                                <div class="form-group">
                                    <strong>Mô tả</strong>
                                    <textarea name="mo_ta" id="editor" cols="30" rows="10" class="form-control" placeholder="Nhập mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Loại sản phẩm id</strong>
                                    <select name="loai_san_phams_id" id="loai_san_phams_id" class="form-control">
                                       @forelse($loai_san_pham as $item)
                                            <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @empty
                                            <option value="">Không có loại sản phẩm</option>
                                       @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Ảnh sản phẩm</strong>
                                    <input type="file" multiple name="images[]" class="form-control"/>
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