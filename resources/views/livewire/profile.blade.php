<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-lg-3 col-xl-3 m-lr-auto m-b-50">
                <ul class="nav nav-pills mb-3 flex-column" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link {{$panelShow == 'profile' ? 'active' : ''}} flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" wire:click="changePanel('profile')" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                          Thông tin cá nhân
                        </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{$panelShow == 'security' ? 'active' : ''}} flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" wire:click="changePanel('security')" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                          Bảo mật
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$panelShow == 'order' ? 'active' : ''}} flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" wire:click="changePanel('order')" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Đơn hàng
                        </a>
                    </li>
                  </ul>
            </div>

            <div class="col-lg-8 col-xl-8 m-lr-auto m-b-50">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane {{$panelShow == 'profile' ? 'active' : ''}}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form method="POST" wire:submit.prevent="submitChangeInfo">
                            @csrf
                            <div class="wrap-login w-100">
                                <h4 class="mtext-109 cl2 p-b-30 txt-left">Thông tin cá nhân</h4>
                                
                                <div class="image-avatar-preview" style="text-align: center;">
                                    <input id="input-change-avatar" type="file" wire:model="avatar" class="image-avatar d-none" />

                                    <div style="width: 150px; height: 150px; margin: auto; position: relative;">
                                        @if ($avatar)
                                        <button wire:click.prevent="deleteImagePreview" class="cl0 bg3 hov-btn3 bor7 p-lr-15 trans-04 pointer" style="position: absolute; left: -10px; top: -10px; padding: 10px 15px;">X</button>
                                        <img class="bor0 w-full h-full" style="object-fit: cover;" src="{{$avatar->temporaryUrl()}}">
                                        @else
                                        <img class="bor0 w-full h-full" style="object-fit: cover;" src={{asset('storage/images/avatar/' . $avatarUser)}}>
                                        @endif
                                    </div>

                                    <label class="flex-c-m stext-101 cl0 size-116 bg3 m-t-30 hov-btn3 p-lr-15 trans-04 pointer" for="input-change-avatar">Thay đổi avatar</label>
                                </div>

                                <div class="m-t-20">
                                    <div class="m-t-20">
                                        <label class="stext-110 cl2">Họ tên:</label>
                                        <input type="text" wire:model="fullName" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                                    </div>
                                    <div class="m-t-20">
                                        <label class="stext-110 cl2">Email:</label>
                                        <input type="text" wire:model="email" disabled name="email" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                                    </div>
                                    <div class="m-t-20">
                                        <label class="stext-110 cl2">Số điện thoại:</label>
                                        <input type="text" wire:model="phone" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                                    </div>
                                    <div class="m-t-20">
                                        <label class="stext-110 cl2">Địa chỉ:</label>
                                        <input type="text" wire:model="address" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                                    </div>
                                    <div class="m-t-20">
                                        <label class="stext-110 cl2">Giới tính:</label>
                                        <select wire:model="gender" type="text" name="gender" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight">
                                            <option value="Name">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 m-t-30 hov-btn3 p-lr-15 trans-04 pointer ">
                                    Lưu thay đổi
                                </button>
                            </div>      
                        </form>
                    </div>
                    <div class="tab-pane {{$panelShow == 'security' ? 'active' : ''}}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form wire:submit.prevent="submitChangePassword" method="POST" action={{ route('submitLogin') }}>
                            @csrf
                            <div class="wrap-login w-100">
                                <h4 class="mtext-109 cl2 p-b-30 txt-left">Bảo mật</h4>
                
                                <div class="m-t-20">
                                    <div class="m-t-20">
                                        <label class="stext-110 cl2">Mật khẩu hiện tại:</label>
                                        <input type="password" wire:model="password" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="m-t-20">
                                        <label class="stext-110 cl2">Mật khẩu mới:</label>
                                        <input type="password" wire:model="newPassword" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                                        @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="m-t-20">
                                        <label class="stext-110 cl2">Xác nhận mật lại mật khẩu mới:</label>
                                        <input type="password" wire:model="newPassword_confirmation" class="mtext-107 clblack p-l-20 p-r-20 p-t-15 p-b-15 w-full plh2 bglight" />
                                        @error('newPassword_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 m-t-30 hov-btn3 p-lr-15 trans-04 pointer ">
                                    Lưu thay đổi
                                </button>
                            </div>      
                        </form>
                    </div>
                    <div class="tab-pane {{$panelShow == 'order' ? 'active' : ''}}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="wrap-table-shopping-cart">

                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Mã</th>
                                    <th class="column-2">Ngày đặt</th>
                                    <th class="column-3">Tổng</th>
                                    <th class="column-4">Trạng thái</th>
                                    <th class="column-5">Hoạt động</th>
                                </tr>
    
                                @foreach($orders as $key => $order)
    
                                <tr class="table_row">
                                    <td class="column-1">
                                        {{$order->id}}
                                    </td>
                                    <td class="column-2">
                                        {{$order->created_at}}
                                    </td>
                                    <td class="column-3">{{number_format($order->total, 0, '.', ',')}} VND</td>
                                    <td class="column-4">
                                        {{$order->status}}
                                    </td>
                                    <td class="column-5">
                                        <a class="d-block" href="/home/track_order/{{$order->id}}">Xem chi tiết</a>
                                        @if($order->status == 'Chưa xác nhận')
                                        <a class="d-block" href="#" wire:click="cancelOrder({{$order->id}})">Hủy đơn hàng</a>
                                        @endif
                                    </td>
                                </tr>
    
                                @endforeach
                            </table>
                        </div>
                        @if(count($orders) > 0)
                        <div class="d-flex justify-content-between m-b-10">
                            <button wire:click="prev()" class="flex-c-m stext-101 cl0 p-t-10 p-b-10 bg3 hov-btn3 m-t-30 p-lr-15 trans-04 pointer">Trước</button>
                            <button wire:click="next()" class="flex-c-m stext-101 cl0 p-t-10 p-b-10 bg3 hov-btn3 m-t-30 p-lr-15 trans-04 pointer">Sau</button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>