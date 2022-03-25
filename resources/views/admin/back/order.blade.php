@extends('admin.template.master')

@section('title', 'Order | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Danh sách đơn hàng')

@section('content')

    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th>
                        <input type="checkbox" id="check-all" class="flat ">
                    </th>
                    <th class="column-title">ID </th>
                    <th class="column-title">Người mua </th>
                    <th class="column-title">Người duyệt </th>
                    <th class="column-title">Phương thức thanh toán </th>
                    <th class="column-title">Tổng đơn hàng </th>
                    <th class="column-title">Trạng thái đơn hàng </th>
                    <th class="column-title">Ngày đặt hàng </th>
                    <th class="column-title">Ngày giao hàng </th>
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                </tr>
            </thead>

            <tbody>
                {{-- <tr class="even pointer">
                    <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" ">121000040</td>
                    <td class=" ">May 23, 2014 11:47:56 PM </td>
                    <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                    <td class=" ">John Blank L</td>
                    <td class=" ">Paid</td>
                    <td class="a-right a-right ">$7.45</td>
                    <td class=" last"><a href="#">View</a>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>

@stop
