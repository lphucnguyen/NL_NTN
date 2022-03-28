@extends('admin.template.master')

@section('title', 'Home | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'W E L C O M E')

@section('content')


    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0"
        width="100%">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $k => $v)
                <tr class="text-center">
                    <td>{{ $v->id }}</td>
                    <td>
                        <div class="row text-center">
                            <div class="col d-flex flex-column align-items-center">
                                <img src="{{ asset('images/avatar/' . $v->avatar) }}" class="img-thumbnail rounded"
                                    width="100" alt="ảnh đại diện">
                                <b>{{ $v->fullname }}</b>
                            </div>
                        </div>
                    </td>
                    <td>{{ $v->phone }}</td>
                    <td>{{ $v->gender }}</td>
                    <td>{{ $v->address }}</td>
                    <td class="text-center text-light">
                        <a class="btn btn-success btn-sm" href="/admin/profile/{{ $v->id }}"><i
                                class="fa fa-book"></i> Profile</a>
                        @if (Auth::id() == 1)
                            <a class="btn btn-primary btn-sm text-light"
                                onclick="editStaff({{ $v->id }}, '{{ $v->email }}', '{{ $v->phone }}')"
                                data-bs-toggle="modal" data-bs-target="#editStaff">
                                <i class="fa fa-edit"></i> Sửa
                            </a>
                            <a class="btn btn-danger btn-sm btn_del_staff" href="/admin/staff/del/{{ $v->id }}"
                                onclick="delStaff(this, '{{ $v->fullname }}')">
                                <i class="fa fa-trash"></i> Xóa
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function delStaff(del, name) {
            var c = confirm("Bạn có chắc muốn xóa nhân viên \"" + name + "\"?");
            if (!c) {
                del.href = "javascript:;"
            }
        }
    </script>

    <!-- Modal Edit Product-->
    <div class="modal fade " id="editStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Chỉnh sửa thông tin nhân viên </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('admin.staff.edit') }}" onsubmit="return checkFrmEditStaff(this)"
                        id="frmEditStaff" method="post">
                        @csrf
                        <input type="hidden" id="id_staff_input" name="id">
                        <div class="form-group">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                        <br>
                        <i class="fw-bold">Bỏ qua nếu không thay đổi mật khẩu</i>
                        <div class="form-group">
                            <label for="new_pass" class="form-label">Nhập mật khẩu mới:</label>
                            <input type="password" id="new_pass" name="new_pass" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="renew_pass" class="form-label">Nhập lại mật khẩu mới:</label>
                            <input type="password" id="renew_pass" name="renew_pass" class="form-control">
                            <i class="text-danger err_renewpass"></i>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit" form="frmEditStaff">Thay đổi</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        function editStaff(id, email, phone) {
            frmEditStaff.email.value = email
            frmEditStaff.phone.value = phone
            frmEditStaff.id.value = id
            frmEditStaff.new_pass.value = null
        }

        function checkFrmEditStaff(frm) {
            var newPass = frm.new_pass.value
            var ReNewPass = frm.renew_pass.value

            if (newPass != ReNewPass) {
                $('.err_renewpass').html('Mật khẩu xác nhận không đúng!')
                return false
            }
        }
    </script>
@stop
