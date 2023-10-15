@extends('layout')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('san-pham.store')}}" method="POST" enctype="multipart/form-data" >
                       @csrf
                        <div class="row">
                            <div class="col-md-12">
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
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Nhập hàng</h3>
                    </div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Nhà cung cấp</strong>
                                    <select id="ncc" class="form-control">
                                        @forelse($nha_cung_cap as $item)
                                            <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @empty
                                            <option>Không có nhà cung cấp</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Sản phẩm</strong>
                                            <select id="san_phams_id" class="form-control">
                                            @forelse($san_pham as $item)
                                                    <option value="{{$item->id}}">{{$item->ten}}</option>
                                                @empty
                                                    <option value="">Không có sản phẩm</option>
                                            @endforelse
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm sản phẩm</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>Số lượng</strong>
                                    <input type="number" name="so_luong" id="so_luong" min=1 class="form-control" placeholder="Nhập số lượng">
                                </div>
                                <div class="form-group">
                                    <strong>Giá nhập</strong>
                                    <input type="number" name="gia_nhap" id="gia_nhap" min=1 class="form-control" placeholder="Nhập giá nhập">
                                </div>
                                <div class="form-group">
                                    <strong>Giá bán</strong>
                                    <input type="number" name="gia_ban" id="gia_ban" min=1 class="form-control" placeholder="Nhập giá bán">
                                </div>
                            </div>
                        </div>
                        <input type="button" id="updateButton" class="btn btn-primary mt-3 mb-3" value="Thêm sản phẩm">
                        <div class="row">
                            <form action="{{route('xu-ly-nhap-hang')}}" method="post">
                            @csrf
                            <table class="table table-striped" id="myTable" name="myTable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá nhập</th>
                                        <th>Giá bán</th>
                                        <th>Thành tiền</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                        </table>
                    </div>
                    <input name="nha_cung_caps_id" id="ncc_id" type="hidden"/>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script> 
        $(document).ready(function(){
            $('#ncc').change(function(){
                $('#ncc_id').val(this.value);
            });
            $('#updateButton').click(()=>{
                var stt = $("#myTable tbody tr").length+1;
                var ten_san_pham = $("#san_phams_id").find(":selected").text();
                var san_phams_id = $("#san_phams_id").find(":selected").val();
                var so_luong = $("#so_luong").val();
                var gia_nhap = $("#gia_nhap").val();
                var gia_ban = $("#gia_ban").val();
                var thanh_tien = so_luong * gia_nhap;
                var row = '';

                var row = `<tr>
                    <td>${stt}</td>
                    <td>${ten_san_pham}<input name="san_phams_id[]" value="${san_phams_id}" type="hidden"/></td>
                    <td>${so_luong}<input name="so_luong[]"  value="${so_luong}" type="hidden"/></td>
                    <td>${gia_nhap}<input name="gia_nhap[]"  value="${gia_nhap}" type="hidden"/></td>
                    <td>${gia_ban}<input name="gia_ban[]"  value="${gia_ban}" type="hidden"/></td>
                    <td>${thanh_tien}<input name="thanh_tien[]"  value="${thanh_tien}" type="hidden"/></td>
                    <td><button class='btn btn-warning btn-edit' type='button'>Sửa</button> | <button class='btn btn-danger btn-delete' type='button'>Xóa</button></td>
                    </tr>`; 
                $("#myTable").find('tbody').append(row);
            });
            
        });
</script>
@endsection