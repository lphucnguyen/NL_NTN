@extends('admin.template.master')

@section('title', 'Profile | Admin - NTN Shop')

@section('heading', '')

@section('des_heading', '')

@section('x_heading', 'Thông tin profile')

@section('content')
    <div class="x_content">
        <div class="col-md-3 col-sm-3  profile_left">
            <div class="profile_img">
                <div id="crop-avatar ">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view img-fluid border-secondary rounded"
                        src="{{ asset('images/avatar') }}/{{ $info->avatar }}" alt="Avatar" title="Change the avatar">
                </div>
            </div>
            <h3>{{ $info->fullname }}</h3>

            <ul class="list-unstyled user_data">
                <li>
                    <i class="fas fa-map-marker-alt"></i> {{ $info->address }}
                </li>
                <li>
                    @if ($info->gender == 'Nam')
                        <i class="fas fa-mars"></i>
                    @else
                        <i class="fas fa-venus"></i>
                    @endif

                    {{ $info->gender }}
                </li>
                <li>
                    <i class="fas fa-phone"></i> {{ $info->phone }}
                </li>
                <li>
                    <i class="far fa-envelope"></i> {{ $info->email }}
                </li>
            </ul>

            @if ($info->id == Auth::id())
                <a class="btn btn-success text-light"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
            @endif

            <br />

        </div>
        <div class="col-md-9 col-sm-9 ">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                            data-toggle="tab" aria-expanded="true">Lịch sử làm việc</a>
                    </li>
                    <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab"
                            data-toggle="tab" aria-expanded="false">Đơn hàng đã duyệt</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                        <!-- start recent activity -->
                        <ul class="messages">
                            @if (count($history) < 1)
                                <p class="text-center fs-5 fw-bold text-primary">Lịch sử trống</p>
                            @endif
                            @foreach ($history->reverse() as $v)
                                <li>
                                    <img src="{{ asset('images/avatar') }}/{{ $info->avatar }}"
                                        class="avatar rounded-circle" alt="Avatar">
                                    <div class="message_date">
                                        <h3 class="date text-info">{{ date('d', $v->create_at) }}</h3>
                                        <p class="month">{{ date('M', $v->create_at) }}</p>
                                    </div>
                                    <div class="message_wrapper">
                                        <h4 class="heading">{{ $v->title }}</h4>
                                        <blockquote class="message">
                                            <p class="text-dark" style="white-space: break-spaces;">{{ $v->content }}</p>
                                        </blockquote>
                                        <p class="url ps-3 text-secondary">
                                            <i class="far fa-clock"></i>
                                            {{ date('h:m:s d-m-Y', $v->create_at) }}
                                        </p>
                                    </div>
                                </li>
                                <hr>
                            @endforeach

                        </ul>
                        <!-- end recent activity -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <table class="data table table-striped no-margin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Phương Thức Thành Toán</th>
                                    <th>Tổng Tiền</th>
                                    <th>Trạng Thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($order) < 1)
                                    <tr>
                                        <td class="fw-bold fs-6 text-center" colspan="5">
                                            Chưa duyệt đơn hàng nào
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($order as $k => $v)
                                    <tr>
                                        <td>{{ $k + 1 }}</td>
                                        <td>{{ $v->fullname }}</td>
                                        <td>{{ $v->payment_method }}</td>
                                        <td>{{ $v->total }}</td>
                                        <td class="vertical-align-mid">
                                            {{ $v->status }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
