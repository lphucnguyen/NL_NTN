@extends('admin.template.master')

@section('title', 'Product | Admin - NTN Store')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Danh sách hàng hóa')

@section('content')
    @if (session('notify_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('notify_success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('notify_fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('notify_fail') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th>Loại</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product_list as $k => $v)
                <tr>
                    <td class="text-center">{{ $k + 1 }}</td>
                    <td>{{ $v->name_type }}</td>
                    <td>{{ $v->name }}</td>
                    <td class="text-center">{{ $v->quantity }}</td>
                    <td class="text-center">{{ number_format($v->price) }} VNĐ</td>
                    <td class="text-center">
                        <a class="btn btn-success btn-sm text-light" onclick="showPD({{ $v->id }})"
                            data-bs-toggle="modal" data-bs-target="#viewProductDetail"><i class="far fa-eye"></i> Chi
                            tiết</a>
                        <a class="btn btn-primary btn-sm text-light"onclick="editProduct({{ $v->id }})"
                            data-bs-toggle="modal" data-bs-target="#editProduct"><i class="fa fa-edit"></i> Sửa</a>
                        <a class="btn btn-danger btn-sm text-light"
                            onclick="deleteProduct({{ $v->id }}, '{{ $v->name }}')"><i
                                class="fas fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal Product Detail-->
    <div class="modal fade " id="viewProductDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Product Detail </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal_product_detail">
                    {{-- content modal --}}
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Edit Product-->
    <div class="modal fade " id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Chỉnh sửa sản phẩm </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal_editProduct">
                    {{-- content modal --}}
                </div>

            </div>
        </div>
    </div>

    {{-- JavaScript --}}
    <script src="{{ asset('js/admin_product.js') }}"></script>

@stop
