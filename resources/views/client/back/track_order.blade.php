@extends('client.template.master')

@section('title', "Kiểm tra hóa đơn | NTN Shop")

@section('content')
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb m-l-25 m-r--38 m-lr-0-xl">
        <a href="/home" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Giỏ hàng
        </span>
    </div>

    <div class="row invoice">
        <!-- title row -->
        <div class="invoice-header col-12">
            <p class="ltext-103 text-center cl5">Hóa đơn</p>
            <p class='stext-103 text-center cl5'>Ngày lập: {{ $created_order }}</p>
        </div>

        <div class="col-sm-12 col-lg-4 m-t-20">
            <div class="invoice-col w-100 bor10 p-lr-40 p-t-30 p-b-40 m-r-20 m-lr-0-xl p-lr-15-sm">
                <p class="mtext-103 cl5 m-b-10">Khách hàng: </p>
                <address>
                    <strong class="stext-103 cl5">Tên: </strong> {{ $order->user->fullname }}<br>
                    <strong class="stext-103 cl5">Địa chỉ:</strong> {{ $order->user->address }}
                    <br><strong class='stext-103 cl5'>Số điện thoại:</strong> {{ $order->user->phone }}
                    <br><strong class="stext-103 cl5">Email:</strong> {{ $order->user->email }}
                </address>
            </div>
        </div>


        <div class="col-sm-12 col-lg-4 m-t-20">
            <div class="invoice-col w-100 bor10 p-lr-40 p-t-30 p-b-40 m-r-40 m-lr-0-xl p-lr-15-sm">
                <p class="mtext-103 cl5 m-b-10">Hóa đơn: </p>
                <b class="stext-103 cl5">Đơn hàng: #{{ $order->id }}</b>
                <br/>
                @if($order->status != 'Hủy đơn hàng')
                <b class="stext-103 cl5">Ngày thanh toán:</b>
                    @if ($order->status_payment == 0)
                        Chưa thanh toán 
                        @if($order->payment_method == 'VNPay') (<a href="/home/process/vnpay/{{$order->id}}">Thanh toán ngay</a>)
                        @elseif($order->payment_method == 'MoMo') (<a href="/home/process/momo/{{$order->id}}">Thanh toán ngay</a>)
                        @endif   
                    @else
                        Đã thanh toán
                    @endif
                <br/>
                @endif
                <b class="stext-103 cl5">Tình trạng:</b> {{ $order->status }}
            </div>
        </div>

        <!-- info row -->
        <div class="invoice-info m-b-20 col-12 m-t-20">

            <div class="wrap-table-shopping-cart m-t-20">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Mã sản phẩm</th>
                            <th class="column-2">Tên sản phẩm</th>
                            <th class="column-3">Số lượng</th>
                            <th class="column-4">Giá</th>
                            <th class="column-4">Bảo hành</th>
                            <th class="column-5">Thành tiền</th>
                        </tr>
                        @foreach ($order_details as $order_detail)
                        <tr class="text-left">
                                <td class="column-1 p-t-10 p-b-10">{{ $order_detail->product->id }}</td>
                                <td class="column-2">{{ $order_detail->product->name }}</td>
                                <td class="column-3">{{ $order_detail->quantity }}</td>
                                <td class="column-4">{{ number_format($order_detail->product->price) }} VNĐ</td>
                                <td class="column-4">{{ $warranty_order }}</td>
                                <td class="column-5">{{ number_format($order_detail->amount * $order_detail->quantity, 0, ',', '.') }} VNĐ</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <!-- /.col -->
            </div>
            <div class="col-md-6">
                <p class="lead mtext-103 cl5 m-b-10 m-t-20">Phương thức thanh toán: <b>{{ $order->payment_method }}</b></p>

                <p class="text-muted well well-sm no-shadow stext-103 cl5" style="margin-top: 10px;">
                    @if ($order->payment_method == 'MoMo')
                        Đơn hàng đã được thanh toán qua momo.
                    @elseif ($order->payment_method == 'VNPay')
                        Đơn hàng đã được thanh toán qua momo.
                    @else
                        Đơn hàng được thanh toán bằng tiền mặt khi nhận hàng.
                    @endif
                    <br><br>
                    Trong thời gian bảo hành nếu có bất cứ vấn đề gì
                    xin hãy liên hệ qua email hoặc số điện thoại của cửa hàng.
                    <br><br>
                    Số điện thoại: 099 978 9889<br>
                    Email: ntnsotre@gmail.com
                </p>
            </div>
            <div class="col-md-6">
                <p class="lead mtext-103 cl5 m-b-10 m-t-20">Tổng thành tiền</p>
                <br>
                <div class="table-responsive stext-103 cl5">
                    <table class="table">
                        <tbody>
                            @if(!is_null($order->promotion))
                            <tr>
                                <th>Khuyến mãi ({{ $order->promotion->percent }}%)</th>
                                <td>
                                    {{ number_format($order->promotion->percent * $order->total / 100, 0, ',', '.') }} VNĐ
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th>VAT:</th>
                                <td>Sản phẩm đã bao gồm VAT</td>
                            </tr>
                            <tr>
                                <th>Tổng:</th>
                                <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="m-b-10 m-t-10 text-right">
            <div class="d-flex justify-content-end m-l-auto">
                {{-- <button class="btn btn-default" onclick="PrintElem()"><i class="fa fa-print"></i> Print</button> --}}
                <button onclick="PrintElem()" class="flex-c-m stext-101 cl0 p-t-10 p-b-10 bg3 hov-btn3 p-lr-15 trans-04 pointer" style="margin-right: 5px;">
                    <i class="fa fa-download m-r-5"></i>
                    In Hoá Đơn
                </button>
            </div>
        </div>

    </div>



</div>

@stop

@push('scripts')

    <script>
        function PrintElem()
        {
            var mywindow = window.open('', 'PRINT', 'height=1000,width=700');

            mywindow.document.write(
                '<html><head><link href="https://colorlib.com/client_template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"><link href="http://localhost:8000/client_template/css/util.css" rel="stylesheet"><link href="http://localhost:8000/client_template/css/main.css" rel="stylesheet"></head><body>'
            );
            mywindow.document.write('<div class="container">' + document.querySelector('.invoice').outerHTML  + '</div>');
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            // mywindow.close();

            return true;
        }
    </script>

@endpush