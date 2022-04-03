@extends('admin.template.master')

@section('title', 'Order | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Danh sách đơn hàng')

@section('content')
<form action="{{ route('admin.order.actionlist') }}" id="frmActionOrder" method="post">
@csrf
    <table id="datatable" class="table table-striped jambo_table bulk_action w-100">
        <thead style="border-radius: 20px">
            <tr class="headings" >
                <th>
                    <input type="checkbox" id="check-all" class="flat ">
                </th>
                <th class="column-title" style="vertical-align: middle !important;">ID </th>
                <th class="column-title" style="vertical-align: middle !important;">Người mua </th>
                <th class="column-title" style="vertical-align: middle !important;">Địa chỉ </th>
                <th class="column-title">Trạng thái đơn hàng </th>
                <th class="column-title">Ngày giao hàng </th>
                <th class="column-title">Ngày nhận hàng </th>
                <th class="column-title no-link last">
                    <span class="nobr">Thao tác</span>
                </th>
                <th class="bulk-actions" colspan="9">
                    <div class="dropdown">
                        <button class="btn btn-transparent border-0 p-0 m-0 text-light dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thao tác
                        </button>
                        <div class="dropdown-menu rounded" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item btn_submit" type="submit" form="frmActionOrder" id="submit_confirm" name="submit_confirm" value="true">Đánh dấu tất cả đã duyệt</button>
                            <button class="dropdown-item btn_submit" type="submit" form="frmActionOrder" id="submit_done" name="submit_done" value="true">Đánh dấu tất cả đã hoàn thành</button>
                            <button class="dropdown-item btn_submit" type="submit" form="frmActionOrder" id="submit_fail" name="submit_fail" value="true">Đánh dấu tất cả thất bại</button>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($order as $v)
                <tr class="even pointer text-center">
                    <td class="a-center ">
                        <input type="checkbox" class="flat table_records order_records" name="order_records[]"
                            value="{{ $v->id }}">
                    </td>
                    <td class=" ">{{ $v->id }}</td>
                    <td class="text-left ">{{ $v->user_fullname }}</td>
                    <td class="text-left ">{{ $v->address }}</td>
                    <td class=" status_order">{{ $v->status }}</td>
                    <td class=" ">{{ $v->delivery_date }}</td>
                    <td class=" ">{{ $v->receiving_date }}</td>
                    <td class=" last">
                        <a href="/admin/order/detail/{{ $v->id }}">Xem</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>

@stop
