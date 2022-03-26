@extends('admin.template.master')

@section('title', 'Order | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Danh sách đơn hàng')

@section('content')

    <table id="datatable" class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th>
                    <input type="checkbox" id="check-all" class="flat ">
                </th>
                <th class="column-title" style="vertical-align: middle !important;">ID </th>
                <th class="column-title" style="vertical-align: middle !important;">Người mua </th>
                <th class="column-title">Người duyệt </th>
                <th class="column-title">Phương thức thanh toán </th>
                <th class="column-title">Tổng đơn hàng </th>
                <th class="column-title">Trạng thái đơn hàng </th>
                <th class="column-title">Ngày đặt hàng </th>
                <th class="column-title">Ngày giao hàng </th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="bulk-actions" colspan="9">
                    <div class="dropdown">
                        <button class="btn btn-transparent border-0 p-0 m-0 text-light dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thao tác
                        </button>
                        <div class="dropdown-menu rounded" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Đánh dấu tất cả đã duyệt</a>
                            <a class="dropdown-item" href="#">Đánh dấu tất cả đã hoàn thành</a>
                            <a class="dropdown-item" href="#">Đánh dấu tất cả thất bại</a>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($order as $v)
                <tr class="even pointer">
                    <td class="a-center ">
                        <input type="checkbox" class="flat table_records" name="table_records[]"
                            value="{{ $v->id }}">
                    </td>
                    <td class=" ">{{ $v->id }}</td>
                    <td class=" ">{{ $v->user_fullname }}</td>
                    <td class=" ">{{ $v->admin_fullname }}</td>
                    <td class=" ">{{ $v->payment_method }}</td>
                    <td class=" ">{{ $v->total }}</td>
                    <td class="status_order">{{ $v->status }}</td>
                    <td class=" ">{{ $v->order_date }}</td>
                    <td class=" ">{{ $v->delivery_date }}</td>
                    <td class=" last">
                        <a href="#">Chi tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
