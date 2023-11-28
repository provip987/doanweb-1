<style>
    #tb-ds-san-pham th {
        padding: 10px;
        /* Thêm khoảng trống 10px vào mỗi bên trong thẻ <th> */
        text-align: center;
        /* Căn giữa nội dung bên trong thẻ <th> */
    }

    #tb-ds-san-pham td {
        padding: 10px;
        /* Thêm khoảng trống 10px vào mỗi bên trong thẻ <td> */
    }
</style>
@extends('index')
@section('content')
<form>
    <h1>XUẤT HOÁ ĐƠN </h1>
    <label>Khách Hàng</label>
    <select name="kh" id="kh">

        @foreach( $dsKH as $KH)
        <option value="{{$KH->id}}"> {{$KH->ho_ten}}</option>
        @endforeach
    </select>

    <label>Người Tạo</label>
    <select name="nt" id="nt">
        @foreach($dsNhanVien as $NV)
        <option value="{{$NV->id}}"> {{$NV->ho_ten}}</option>
        @endforeach
    </select>
    <label>Chọn Sản Phẩm</label>
    <select name="sp" id="sp">
        @foreach($dsSanPham as $SP)
        <option value="{{$SP->id}}"> {{$SP->ten}}</option>
        @endforeach
    </select>
    <label>Ngày Tạo</label>
    <input type="date" id="ngay-tao" />
    <label>Mã Hoá Đơn</label>
    <input type="text" id="mahd" />


    <br></br>
    <label>Số Lượng</label>
    <input type="number" id="so-luong" value="0" />
    <label>Giá Bán</label>
    <input type="number" id="gia-ban" value="0" />
    <label>Tổng Tiền</label>
    <input type="number" id="tong-tien" />
    <label>Trạng Thái</label>
    <input type="text" id="trang-thai" />
    <br></br>
    <button type="button" id="btn-them">Thêm Vào Danh Sách</button>
    <br></br>
    <table id="tb-ds-san-pham" border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Khách Hàng</th>
                <th>Ngày Tạo</th>
                <th>Mã Hoá Đơn</th>
                <th>Người Tạo</th>
                <th>Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá Bán</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


    <br /><br />
    <button type="submit">Xuất</button>
</form>

@endsection



@section('nhaphang')
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-them").click(function() {
            var stt = $('#tb-ds-san-pham tbody tr').length + 1;
            var khachHang = $("#kh").find(":selected").text();

            var ngayTao = $("#ngay-tao").val();


            var maHD = $("#mahd").val();
            var idKH = $("#kh").find(":selected").val();

            var nguoiTao = $("#nt").find(":selected").text();
            var idNT = $("#nt").find(":selected").val();

            var tenSp = $("#sp").find(":selected").text();
            var idSP = $("#sp").find(":selected").val();
            var soLuong = $("#so-luong").val();
            var giaBan = $("#gia-ban").val();
            var giaNhap = $("#gia-nhap").val();
            var trangThai = $("#trang-thai").val();

            var thanhTien = $("#tong-tien").val();

            //tạo 1 dòng    
            var row = `<tr>
            <td>${stt}</td>
            <td>${khachHang}<input type="hidden" name ="khID[]" value="${idKH}"/></td>
            <td>${ngayTao}<input type="hidden" name ="ngaytaoID[]" value="${ngayTao}"/></td>
            <td>${maHD}<input type="hidden" name ="mahdID[]" value="${maHD}"/></td>
            <td>${nguoiTao}<input type="hidden" name ="ntID[]" value="${idNT}"/></td>

            <td>${tenSp}<input type="hidden" name ="spID[]" value="${idSP}"/></td>
            <td>${soLuong}<input type="hidden" name ="soLuong[]" value="${soLuong}"/></td>
            
            <td>${giaBan}<input type="hidden" name ="giaBan[]" value="${giaBan}"/></td>

             <td>${thanhTien}<input type="hidden" name ="thanhTien[]" value="${thanhTien}"/></td>
            <td>${trangThai}<input type="hidden" name ="trangThai[]" value="${trangThai}"/></td>

            <td> <a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a></td>
          

            </tr>`;
            // theem cuoi tab

            $("#tb-ds-san-pham").find('tbody').append(row);

            //xoa
            $("#tb-ds-san-pham").on("click", ".delete-link", function(e) {
                e.preventDefault();
                $(this).closest("tr").remove();
                // Cập nhật lại STT sau khi xóa
                $('#tb-ds-san-pham tbody tr').each(function(index) {
                    $(this).find("td:first").text(index + 1);
                });

            });

            // Chỉnh sửa dòng
            $("#tb-ds-san-pham").on("click", ".edit-link", function(e) {
                e.preventDefault();
                var tr = $(this).closest("tr");

                // Lưu trữ giá trị hiện tại
                var currentData = {
                    soLuong: tr.find("td:eq(6)").text(),
                    giaBan: tr.find("td:eq(7)").text(),
                };

                // Thay đổi dòng sang chế độ chỉnh sửa
                tr.find("td:eq(6)").html(`<input type="number" value="${currentData.soLuong}" class="so-luong-input-edit" />`);
                tr.find("td:eq(7)").html(`<input type="number" value="${currentData.giaBan}" class="gia-ban-input-edit" />`);
                tr.find("td:last").html(`<a href="#" class="save-link">Lưu</a> | <a href="#" class="cancel-link">Hủy</a>`);
            });

            // Lưu chỉnh sửa
            $("#tb-ds-san-pham").on("click", ".save-link", function(e) {
                e.preventDefault();
                var tr = $(this).closest("tr");
                var newSoLuong = tr.find(".so-luong-input-edit").val();
                var newGiaBan = tr.find(".gia-ban-input-edit").val();
                var newThanhTien = newSoLuong * newGiaBan;

                tr.find("td:eq(6)").text(newSoLuong);
                tr.find("td:eq(7)").text(newGiaBan);
                tr.find("td:eq(8)").text(newThanhTien);
                tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
            });

            // Hủy chỉnh sửa
            $("#tb-ds-san-pham").on("click", ".cancel-link", function(e) {
                e.preventDefault();
                var tr = $(this).closest("tr");

                tr.find("td:eq(6)").text(tr.find(".so-luong-input-edit").val());
                tr.find("td:eq(7)").text(tr.find(".gia-ban-input-edit").val());
                tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
            });

        });
    });
</script>
@endsection