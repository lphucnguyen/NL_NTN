@extends('admin.template.master')

@section('title', 'Statistical | Admin - NTN Shop')

@section('statistical')
    <div class="row d-flex justify-content-center" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-2 col-sm-4 col tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Tổng đơn hàng</span>
                <div class="count">{{ count($order) }}</div>

                <span class="count_bottom">
                    @php

                    @endphp

                    <i class="green"><i class="fa fa-sort-asc"></i>4% </i>
                    From last Week
                </span>
            </div>
            <div class="col-md-2 col-sm-4 col tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Chưa xác nhận</span>
                <div class="count">{{ $order->where('status', 'Chưa xác nhận')->count() }}</div>

                <span class="count_bottom">
                    <i class="green"><i class="fa fa-sort-asc"></i>3% </i>
                    From last Week
                </span>
            </div>
            <div class="col-md-2 col-sm-4 col tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Đang giao</span>
                <div class="count">{{ $order->where('status', 'Đang giao hàng')->count() }}</div>

                <span class="count_bottom">
                    <i class="red"><i class="fa fa-sort-desc"></i>12% </i>
                    From last Week
                </span>
            </div>
            <div class="col-md-2 col-sm-4 col tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Hoàn thành</span>
                <div class="count">{{ $order->where('status', 'Đã hoàn thành')->count() }}</div>
                <span class="count_bottom">
                    <i class="green"><i class="fa fa-sort-asc"></i>34% </i>
                    From last Week
                </span>
            </div>
            <div class="col-md-2 col-sm-4 col tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Thất bại</span>
                <div class="count">{{ $order->where('status', 'Thất bại')->count() }}</div>
                <span class="count_bottom">
                    <i class="green"><i class="fa fa-sort-asc"></i>34% </i>
                    From last Week
                </span>
            </div>
        </div>
    </div>
@stop

@section('des_heading', '')

@section('x_heading', 'Thống kê đơn hàng')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        @php
                            $sum_product = DB::table('order_detail')
                                ->distinct()
                                ->count('product_id');
                        @endphp
                        <h3>Biểu đồ lượng sản phẩm đã bán
                            <br><small class="fs-6">Tổng sản phẩm đã bán: {{ $sum_product }}</small>
                            <br><small class="fs-6">Tổng số lượng sản phẩm đã bán:
                                {{ $order_detail->sum('quantity') }}</small>
                        </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="dropdown">
                            <button class="btn btn-transparent border py-1 dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-calendar"></i> Chọn thời gian
                            </button>
                            <div class="dropdown-menu p-3 mt-2 pull-right w-100" aria-labelledby="dropdownMenuButton">
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="start_date" class="form-label">Từ ngày:</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                    <div class="col form-group">
                                        <label for="end_date" class="form-label">Đến ngày:</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date"
                                            max="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-success" type="submit" form="">Thống kê</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bar chart -->
                <div id="graph_bar" style="width:100%; height:280px;"></div>
                <!-- /bar charts -->
                <div class="col-md-3 col-sm-3  bg-white">
                    <div class="x_title">
                        <h2>Sản phẩm bán chạy</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 ">
                        <div>
                            <p>Facebook Campaign</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Twitter Campaign</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Twitter Campaign</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Twitter Campaign</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
@stop
