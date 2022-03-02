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
                <th>
                    <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">Invoice </th>
                <th class="column-title">Invoice Date </th>
                <th class="column-title">Order </th>
                <th class="column-title">Bill to Name </th>
                <th class="column-title">Status </th>
                <th class="column-title">Amount </th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">
                        </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
            </tr>
        </thead>

        <tbody>
            <tr class="even pointer">
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
            </tr>
        </tbody>
    </table>
</div>

@stop