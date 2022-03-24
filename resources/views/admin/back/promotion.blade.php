@extends('admin.template.master')

@section('title', 'Promotion | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Khuyến mãi')

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
    <div class="text-right text-light mb-3">
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPromotion">Thêm <i
                class="fa fa-plus"></i></a>
    </div>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>MSKM</th>
                <th>Giá trị khuyến mãi</th>
                <th>Nội dung khuyến mãi</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $k => $v)
                <tr class="text-center">
                    <td>{{ $k + 1 }}</td>
                    <td>{{ $v->code }}</td>
                    <td>{{ $v->percent }}</td>
                    <td class="text-left">{{ $v->content }}</td>
                    <td>{{ date('d-m-Y', $v->start_at) }}</td>
                    <td>{{ date('d-m-Y', $v->end_at) }}</td>
                    <td>
                        {{-- <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</button> --}}
                        <a class="btn btn-danger btn-sm text-light"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <!-- Modal Add Promotion-->
    <div class="modal fade " id="addPromotion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100vh">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Thêm mã khuyến mãi mới </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body pt-0">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('images/system/promotion.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <form action="{{ route('admin.promotion.add') }}" id="frmAddPromotion" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="code" class="form-label">Mã khuyến mãi:</label>
                            <input required type="text" id="code" name="code" minlength="6" maxlength="20" class="form-control text-uppercase" placeholder="Mã khuyến mãi">
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="form-label">Ngày bắt đầu:</label>
                            <input required type="date" id="start_date" name="start_date" class="form-control"
                                placeholder="Ngày bắt đầu" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="form-label">Ngày kết thúc:</label>
                            <input required type="date" id="end_date" name="end_date" class="form-control"
                                placeholder="Ngày kết thúc" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="percent" class="form-label">Giá trị khuyến mãi (%):
                                <input required type="text" value="20" style="width: 30px" id="percent_input"
                                    onkeyup="percentInput(this)">
                            </label>
                            <input required type="range" id="percent" name="percent" onchange="rangePercent(this)"
                                class="form-range" value="20" min="1" max="100" step="1"
                                placeholder="Giá trị khuyến mãi">
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Nội dung khuyến mãi:</label>
                            <input required type="text" id="content" name="content" class="form-control"
                                placeholder="Nội dung khuyến mãi">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" form="frmAddPromotion">Thêm</button>
                    <button class="btn btn-success" type="reset" form="frmAddPromotion">Reset</button>
                </div>

                <script>
                    function percentInput(input) {
                        $('#percent').val(input.value)
                    }

                    function rangePercent(percent) {
                        $('#percent_input').val(percent.value)
                    }
                </script>
            </div>
        </div>
    </div>
@stop
