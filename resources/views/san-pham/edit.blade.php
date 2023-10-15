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
                        <h3>Sửa sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('san-pham.index')}}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('san-pham.update', $san_pham->id)}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên sản phẩm</strong>
                                    <input type="text" name="ten" value="{{$san_pham->ten}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <strong>Mô tả</strong>
                                    <textarea name="mo_ta" id="editor" cols="30" rows="10" class="form-control" >{{$san_pham->mo_ta}}</textarea>
                                </div>
                                <div class="form-group">
                                <strong>Mã sản phẩm id</strong>
                                <select name="loai_san_phams_id" id="loai_san_phams_id" class="form-control">
                                    @forelse($loai_san_pham as $item)
                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                    @empty
                                        <option>Không có loại sản phẩm học</option>
                                    @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Ảnh sản phẩm</strong>
                                    <input type="file" multiple name="images[]" class="form-control"/>
                                    @if(session('thongbao'))
                                        <div class="alert alert-success">
                                            {{session('thongbao')}}
                                        </div>
                                    @endif

                                    @foreach($anh_sp as $item)
                                        <img src="{{asset('/'.$item->url)}}" alt="" style="height:100px;width:100px">
                                        <a href="{{route('xoa-anh-sp', $item->id)}}" class="btn btn-danger mt-2">X</a>
                                    @endforeach
                                    <br>
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