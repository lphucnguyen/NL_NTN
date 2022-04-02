@extends('admin.template.master')

@section('title', 'Statistical | Admin - NTN Shop')

@section('x_heading')
    <h2>
        <b>Thống kê đơn hàng</b>
        @if (isset($start) && isset($end))
            <small>{{ date('d/m/Y', strtotime($start)) }} - {{ date('d/m/Y', strtotime($end)) }}</small>
        @endif
    </h2>
@stop

@section('statistical')
    @php
    $order_all = \App\Models\Order::all();

    $carbon = new \Carbon\Carbon();

    if (isset($start) && isset($end)):
        $start = date('d/m/Y', strtotime($start));
        $end = date('d/m/Y', strtotime($end));
    endif;
    $first_day_lastweek = $carbon
        ->now()
        ->subWeek()
        ->startOfWeek();
    $last_day_lastweek = $carbon
        ->now()
        ->subWeek()
        ->endOfWeek();
    $first_day_thisweek = $carbon->now()->startOfWeek();
    $last_day_thisweek = $carbon->now()->endOfWeek();

    //ALL
    $statis_lastweek = $order_all->whereBetween('created_at', [$first_day_lastweek, $last_day_lastweek])->sum('total');
    $statis_thisweek = $order_all->whereBetween('created_at', [$first_day_thisweek, $last_day_thisweek])->sum('total');
    if($statis_lastweek == 0 ) $statis_lastweek = 1;
    $percent_statis = round(($statis_thisweek / $statis_lastweek) * 100, 2);

    //Chua xac nhan
    $statis_lastweek1 = $order_all->where('status', 'Chưa xác nhận')->whereBetween('created_at', [$first_day_lastweek, $last_day_lastweek])->sum('total');
    $statis_thisweek1 = $order_all->where('status', 'Chưa xác nhận')->whereBetween('created_at', [$first_day_thisweek, $last_day_thisweek])->sum('total');
    if($statis_lastweek1 == 0 ) $statis_lastweek1 = 1;
    $percent_statis1 = round(($statis_thisweek1 / $statis_lastweek1) * 100, 2);

    //Dang giao hang
    $statis_lastweek2 = $order_all->where('status', 'Đang giao hàng')->whereBetween('created_at', [$first_day_lastweek, $last_day_lastweek])->sum('total');
    $statis_thisweek2 = $order_all->where('status', 'Đang giao hàng')->whereBetween('created_at', [$first_day_thisweek, $last_day_thisweek])->sum('total');
    if($statis_lastweek2 == 0 ) $statis_lastweek2 = 1;
    $percent_statis2 = round(($statis_thisweek2 / $statis_lastweek2) * 100, 2);

    //Hoan thanh
    $statis_lastweek3 = $order_all->where('status', 'Đã hoàn thành')->whereBetween('created_at', [$first_day_lastweek, $last_day_lastweek])->sum('total');
    $statis_thisweek3 = $order_all->where('status', 'Đã hoàn thành')->whereBetween('created_at', [$first_day_thisweek, $last_day_thisweek])->sum('total');
    if($statis_lastweek3 == 0 ) $statis_lastweek3 = 1;
    $percent_statis3 = round(($statis_thisweek3 / $statis_lastweek3) * 100, 2);

    //That bai
    $statis_lastweek4 = $order_all->where('status', 'Thất bại')->whereBetween('created_at', [$first_day_lastweek, $last_day_lastweek])->sum('total');
    $statis_thisweek4 = $order_all->where('status', 'Thất bại')->whereBetween('created_at', [$first_day_thisweek, $last_day_thisweek])->sum('total');
    if($statis_lastweek4 == 0 ) $statis_lastweek4 = 1;
    $percent_statis4 = round(($statis_thisweek4 / $statis_lastweek4) * 100, 2);
    @endphp

    <div class="row d-flex justify-content-center" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-2 col-sm-4 col tile_stats_count ps-3 ml-4">
                <span class="count_top"><i class="fa fa-user"></i> Tổng đơn hàng</span>
                <div class="count">{{ count($order_all) }}</div>
                {{-- ALL --}}
                <span class="count_bottom">
                    @if ($statis_thisweek >= $statis_lastweek)
                        <i class="green">
                            <i class="fa fa-sort-asc green"></i>{{ $percent_statis }}%
                        </i>
                    @else
                        <i class="green">
                            <i class="fa fa-sort-desc green"></i>{{ 100-$percent_statis }}%
                        </i>
                    @endif
                    From last Week
                </span>
            </div>
            <div class="col-md-2 col-sm-4 col tile_stats_count ps-3 ml-4">
                <span class="count_top"><i class="fa fa-clock-o"></i> Chưa xác nhận</span>
                <div class="count">{{ $order_all->where('status', 'Chưa xác nhận')->count() }}</div>
                {{-- Chua xac nhan --}}
                <span class="count_bottom">
                    @if ($statis_thisweek1 >= $statis_lastweek1)
                        <i class="green">
                            <i class="fa fa-sort-asc green"></i>{{ $percent_statis1 }}%
                        </i>
                    @else
                        <i class="green">
                            <i class="fa fa-sort-desc green"></i>{{ 100-$percent_statis1 }}%
                        </i>
                    @endif
                    From last Week
                </span>
            </div>
            <div class="col-md-2 col-sm-4 col tile_stats_count ps-3 ml-4">
                <span class="count_top"><i class="fa fa-user"></i> Đang giao</span>
                <div class="count">{{ $order_all->where('status', 'Đang giao hàng')->count() }}</div>
                {{-- Dang giao hang --}}
                <span class="count_bottom">
                    @if ($statis_thisweek2 >= $statis_lastweek2)
                        <i class="green">
                            <i class="fa fa-sort-asc green"></i>{{ $percent_statis2 }}%
                        </i>
                    @else
                        <i class="green">
                            <i class="fa fa-sort-desc green"></i>{{ 100-$percent_statis2 }}%
                        </i>
                    @endif
                    From last Week
                </span>
            </div>
            <div class="col-md-2 col-sm-4 col tile_stats_count ps-3 ml-4">
                <span class="count_top"><i class="fa fa-user"></i> Hoàn thành</span>
                <div class="count">{{ $order_all->where('status', 'Đã hoàn thành')->count() }}</div>
                {{-- Da hoan thanh --}}
                <span class="count_bottom">
                    @if ($statis_thisweek3 >= $statis_lastweek3)
                        <i class="green">
                            <i class="fa fa-sort-asc green"></i>{{ $percent_statis3 }}%
                        </i>
                    @else
                        <i class="green">
                            <i class="fa fa-sort-desc green"></i>{{ 100-$percent_statis3 }}%
                        </i>
                    @endif
                    From last Week
                </span>
            </div>
            <div class="col-md-2 col-sm-4 col tile_stats_count ps-3 ml-4">
                <span class="count_top"><i class="fa fa-user"></i> Thất bại</span>
                <div class="count">{{ $order_all->where('status', 'Thất bại')->count() }}</div>
                {{-- That bai --}}
                <span class="count_bottom">
                    @if ($statis_thisweek4 >= $statis_lastweek4)
                        <i class="green">
                            <i class="fa fa-sort-asc green"></i>{{ $percent_statis4 }}%
                        </i>
                    @else
                        <i class="green">
                            <i class="fa fa-sort-desc green"></i>{{ 100-$percent_statis4 }}%
                        </i>
                    @endif
                    From last Week
                </span>
            </div>
        </div>
    </div>
@stop

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
                        <h3>
                            <small class="fs-6">
                                <b>Doanh thu đơn hàng chưa duyệt: </b>
                                {{ number_format($order->where('status', 'Chưa xác nhận')->sum('total')) }} VNĐ
                            </small>
                            <br>
                            <small class="fs-6">
                                <b>Doanh thu đơn hàng đang giao: </b>
                                {{ number_format($order->where('status', 'Đang giao hàng')->sum('total')) }} VNĐ
                            </small>
                            <br>
                            <small class="fs-6">
                                <b>Doanh thu đơn hàng đã hoàn thành: </b>
                                {{ number_format($order->where('status', 'Đã hoàn thành')->sum('total')) }} VNĐ
                            </small>
                            <br>
                            <small class="fs-6">
                                <b>Doanh thu đơn hàng thất bại: </b>
                                {{ number_format($order->where('status', 'Thất bại')->sum('total')) }} VNĐ
                            </small>
                            <br>
                            <small class="fs-6">
                                <b>Tổng doanh thu: </b> {{ number_format($order->sum('total')) }} VNĐ
                            </small>
                        </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="dropdown">
                            <button class="btn btn-transparent border py-1 dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-calendar"></i> Chọn thời gian
                            </button>
                            <a href="/admin/statistical" class="btn btn-success">Tất cả</a>
                            <div class="dropdown-menu p-3 mt-2 pull-right w-100" aria-labelledby="dropdownMenuButton">
                                <div class="row">
                                    <div class="col d-flex flex-column">
                                        <input class="btn btn-light border rounded" value="Tháng hiện tại" readonly
                                            onclick="statistical('{{ $carbon->parse('first day of this month')->toDateString() }}', '{{ $carbon->now()->toDateString() }}')">

                                        <input class="btn btn-light border rounded" value="Tháng vừa qua" readonly
                                            onclick="statistical('{{ $carbon->parse('first day of last month')->toDateString() }}', '{{ $carbon->parse('last day of last month')->toDateString() }}')">

                                        <input class="btn btn-light border rounded" value="3 tháng vừa qua" readonly
                                            onclick="statistical('{{ $carbon->parse('first day of 2 months ago')->toDateString() }}', '{{ $carbon->now()->toDateString() }}')">

                                        <input class="btn btn-light border rounded" value="6 tháng vừa qua" readonly
                                            onclick="statistical('{{ $carbon->parse('first day of 5 months ago')->toDateString() }}', '{{ $carbon->now()->toDateString() }}')">

                                        <input class="btn btn-light border rounded" value="Năm hiện tại" readonly
                                            onclick="statistical('{{ $carbon->now()->year }}-01-01', '{{ $carbon->now()->toDateString() }}')">

                                        <input class="btn btn-light border rounded" value="Năm trước" readonly
                                            onclick="statistical('{{ $carbon->now()->subYear()->year }}-01-01', '{{ $carbon->now()->subYear()->year }}-12-31')">

                                    </div>
                                    <div class="col">
                                        <form action="/admin/statistical" id="frmSubmitStatistical" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="start_date" class="form-label">Từ ngày:</label>
                                                <input type="date" class="form-control" name="start_date" id="start_date"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date" class="form-label">Đến ngày:</label>
                                                <input type="date" class="form-control" name="end_date" id="end_date"
                                                    required max="{{ date('Y-m-d') }}">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-success" type="submit" form="frmSubmitStatistical">
                                            Thống kê
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  chart -->
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-12 d-flex align-items-end">
                            <canvas id="myChart" class=" ml-0 ps-0"></canvas>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-5 text-center">
                            <canvas id="myChart2"></canvas>
                        </div>
                        <div class="col-1"></div>
                        <div class="col ml-3 bg-white">
                            <div class="x_title">
                                <h2>Sản phẩm bán chạy</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-12 col-sm-12 ">
                                <div>
                                    <p>Facebook Campaign</p>
                                    <div class="">
                                        <div class="progress progress_sm" style="width: 76%;">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Twitter Campaign</p>
                                    <div class="">
                                        <div class="progress progress_sm" style="width: 76%;">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Twitter Campaign</p>
                                    <div class="">
                                        <div class="progress progress_sm" style="width: 76%;">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Twitter Campaign</p>
                                    <div class="">
                                        <div class="progress progress_sm" style="width: 76%;">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / charts -->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    @php
    $chuaXacNhan = $dangGiao = $hoanThanh = $thatBai = 0;
    foreach ($order as $k => $v) {
        if ($v->status == 'Chưa xác nhận') {
            $chuaXacNhan += $order_detail->where('order_id', $v->id)->sum('quantity');
        } elseif ($v->status == 'Đang giao hàng') {
            $dangGiao += $order_detail->where('order_id', $v->id)->sum('quantity');
        } elseif ($v->status == 'Đã hoàn thành') {
            $hoanThanh += $order_detail->where('order_id', $v->id)->sum('quantity');
        } elseif ($v->status == 'Thất bại') {
            $thatBai += $order_detail->where('order_id', $v->id)->sum('quantity');
        }
    }

    @endphp

    <script>
        //Value Chart
        var chuaXacNhan = {{ $chuaXacNhan }};
        var dangGiao = {{ $dangGiao }};
        var hoanThanh = {{ $hoanThanh }};
        var thatBai = {{ $thatBai }};
        var start_date = '0';
        var end_date = '0';
        @if (isset($start) && isset($end))
            start_date = '{{ $start }}'
            end_date = '{{ $end }}'
        @endif
        var tongDH = chuaXacNhan + dangGiao + hoanThanh + thatBai

        var data = new Array(tongDH, chuaXacNhan, dangGiao, hoanThanh, thatBai)
        var data2 = new Array(
            (chuaXacNhan / tongDH * 100).toFixed(2),
            (dangGiao / tongDH * 100).toFixed(2),
            (hoanThanh / tongDH * 100).toFixed(2),
            (thatBai / tongDH * 100).toFixed(2)
        )

        var title1 = "Số lượng sản phẩm theo trạng thái tất cả đơn hàng"
        var title2 = "Tỉ lệ sản phẩm theo trạng thái tất cả đơn hàng"

        if (start_date != 0 && end_date != 0) {
            title1 = "Sản phẩm theo trạng thái đơn hàng từ " + start_date + " đến " + end_date
            title2 = "Tỉ lệ sản phẩm theo đơn hàng từ " + start_date + " đến " + end_date
        }
    </script>

    <script src="{{ asset('js/chart.js') }}"></script>
@stop
