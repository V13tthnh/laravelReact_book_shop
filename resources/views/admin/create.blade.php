@extends('layout')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm nhân viên</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('admin.index')}}" class="btn btn-primary float-end">Danh sách nhân viên</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.store')}}" method="POST" >
                       @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tên</strong>
                                    <input type="text" name="ten" class="form-control" placeholder="Nhập tên nhân viên">
                                </div>
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="text" name="email" class="form-control" placeholder="Nhập email">
                                </div>
                                <div class="form-group">
                                    <strong>Mật khẩu</strong>
                                    <input type="password" name="password" min=1 class="form-control" placeholder="Nhập số lượng">
                                </div>
                                <div class="form-group">
                                    <strong>Quyền</strong>
                                    <select name="quyen" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="0">nhân viên</option>
                                    </select>
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