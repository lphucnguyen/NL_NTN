@extends('admin.template.master')

@section('title', "Home | Admin - NTN Shop")

@section('heading', "")

@section('des_heading', "")

@section('x_heading', "W E L C O M E")

@section('content')


<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title">MSDH</th>
                <th class="column-title">Tên khách hàng</th>
                <th class="column-title">Ngày nhận đơn</th>
                <th class="column-title">Sản phẩm</th>
                <th class="column-title">Số lượng</th>
                <th class="column-title">Thành tiền</th>
                <th class="column-title">Trạng thái</th>
            </tr>
        </thead>

        <tbody>
            <tr class="even pointer">
                <td class=" ">121000040</td>
                <td class=" ">Nami</td>
                <td class=" ">May 23, 2014 11:47:56 PM </td>
                <td class=" ">Nhẫn</td>
                <td class=" ">John Blank L</td>
                <td class=" ">Paid</td>
                <td class="a-right a-right ">$7.45</td>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@stop