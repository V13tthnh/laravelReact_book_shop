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
                        <h3>Thêm loại nhà cung cấp</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('nha-cung-cap.index')}}" class="btn btn-primary float-end">Danh sách nhà cung cấp</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('nha-cung-cap.store')}}" method="POST">
                       @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên</strong>
                                    <input type="text" name="ten" class="form-control" placeholder="Nhập tên nhà cung cấp">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Mã NCC</strong>
                                            <input type="text" name="ma_ncc" id="ncc" class="form-control" placeholder="Nhập mã nhà cung cấp" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <button type="button" class="btn btn-primary" id="tao_ma">Tạo mã</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>Địa chỉ</strong>
                                    <input type="text" name="dia_chi" class="form-control" placeholder="Nhập địa chỉ">
                                </div>
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="text" name="email" class="form-control" placeholder="Nhập email">
                                </div>
                                <div class="form-group">
                                    <strong>Điện thoại</strong>
                                    <input type="text" name="phone" class="form-control" placeholder="Nhập điện thoại">
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

@section('js')
<script>
    $(document).ready(function(){
        $('#tao_ma').click(function(){
            var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var length = characters.length;
            let counter = 0;
            var result = '';
            while (counter < 15) {
                result += characters.charAt(Math.floor(Math.random() * length));
                counter += 1;
            }
            $('#ncc').val(result);
        });
    });
</script>
@endsection