@extends('admin.template.master')

@section('title', 'Statistical | Admin - NTN Shop')

@section('x_heading', 'Thông kê sản phẩm')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">

                {{-- Sản phẩm gần hết --}}
                @if (count($out_of_stock) > 0)
                    <div class="mt-4">
                        <h3 class="text-warning"><b>Các sản phẩm sắt hết hàng!!!</b></h3>
                        <table id="datatabl" class="table table-striped jambo_table w-100">
                            <thead style="border-radius: 20px" class="bg-warning">
                                <tr class="headings text-center">
                                    <th class="column-title" style="vertical-align: middle !important;">ID Sản phẩm</th>
                                    <th class="column-title">Tên sản phẩm </th>
                                    <th class="column-title">Số lượng còn lại </th>
                                    <th class="column-title">
                                        <span class="nobr">Thao tác</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($out_of_stock as $v)
                                    <tr class="even pointer text-center">
                                        <td class=" ">{{ $v->id }}</td>
                                        <td class="text-left ">{{ $v->name }}</td>
                                        <td class=" status_order">{{ $v->quantity }}</td>
                                        <td class=" last">
                                            <a href="javascript:;" onclick="showPD({{ $v->id }})"
                                                data-bs-toggle="modal" data-bs-target="#viewProductDetail">Xem sản phẩm</a>
                                            <a href="javascript:;" class="ms-3"
                                                onclick="editProduct({{ $v->id }})" data-bs-toggle="modal"
                                                data-bs-target="#editProduct"><i class="fa fa-edit"></i> Sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                @endif
                {{-- /Sản phẩm gần hết --}}
                {{-- Sản phẩm tồn kho --}}
                <div class="mt-4">
                    <h3 class=""><b>Các sản phẩm tồn kho</b></h3>
                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width:100%" role="grid" aria-describedby="datatable_info">
                        <thead style="border-radius: 20px" class="">
                            <tr class="headings text-center">
                                <th class="column-title" style="vertical-align: middle !important;">ID Sản phẩm</th>
                                <th class="column-title">Tên sản phẩm </th>
                                <th class="column-title">Số lượng còn lại </th>
                                <th class="column-title">
                                    <span class="nobr">Thao tác</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($ton_kho as $v)
                                <tr class="even pointer text-center">
                                    <td class=" ">{{ $v->id }}</td>
                                    <td class="text-left ">{{ $v->name }}</td>
                                    <td class=" status_order">{{ $v->quantity }}</td>
                                    <td class=" last">
                                        <a href="javascript:;" onclick="showPD({{ $v->id }})"
                                            data-bs-toggle="modal" data-bs-target="#viewProductDetail">Xem sản phẩm</a>
                                        <a href="javascript:;" class="ms-3"
                                            onclick="editProduct({{ $v->id }})" data-bs-toggle="modal"
                                            data-bs-target="#editProduct"><i class="fa fa-edit"></i> Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                {{-- /Sản phẩm tồn kho --}}

            </div>
        </div>
    @stop
