<div class="row">
    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
        <div class="p-b-30 m-lr-15-sm">
            <!-- Review -->

            @if(count($reviews) == 0)
            <div class="txt-center m-t-15 m-b-15">Không có đánh giá nào</div>
            @endif
            @foreach($reviews as $review)
            <div class="flex-w flex-t p-b-68">
                <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                    <img src={{asset('/images/users/' . $review->user->avatar)}} alt="AVATAR">
                </div>

                <div class="size-207">
                    <div class="flex-w flex-sb-m p-b-17">
                        <span class="mtext-107 cl2 p-r-20">
                            {{$review->user->fullname}}
                        </span>

                        <span class="fs-18 cl11">
                            @for($i=0; $i<(int)$review->star; $i++)
                            <i class="zmdi zmdi-star"></i>
                            @endfor
                            @for($i=(int)$review->star; $i<5; $i++)
                            <i class="zmdi zmdi-star-outline"></i>
                            @endfor
                        </span>
                    </div>

                    <p class="stext-102 cl6">
                        {{$review->content}}
                    </p>
                </div>
            </div>
            @endforeach    

            @if(!Auth::user())
                <h6 class="smtext-101 txt-center">Bạn cần đăng nhập để đánh giá</h6>
                <a href="/home/login" class="flex-c-m stext-101 cl0 size-116 bg1 hov-btn3 m-t-30 p-lr-15 trans-04 pointer ">
                    Đăng nhập
                </a>  
            @else

                <!-- Add review -->
                <form wire:submit.prevent="submitReview" class="w-full">
                    <h5 class="mtext-108 cl2 p-b-7">
                        Thêm đánh giá
                    </h5>

                    <p class="stext-102 cl6">
                        Email sẽ không được hiển thị
                    </p>

                    <div class="flex-w flex-m p-t-50 p-b-23">
                        <span class="stext-102 cl3 m-r-16">
                            Đánh giá sao
                        </span>

                        <span class="wrap-rating fs-18 cl11 pointer">
                            <i class="item-rating pointer zmdi zmdi-star{{$star >= 1 ? '' : '-outline'}}" wire:click="addStar(1)"></i>
                            <i class="item-rating pointer zmdi zmdi-star{{$star >= 2 ? '' : '-outline'}}" wire:click="addStar(2)"></i>
                            <i class="item-rating pointer zmdi zmdi-star{{$star >= 3 ? '' : '-outline'}}" wire:click="addStar(3)"></i>
                            <i class="item-rating pointer zmdi zmdi-star{{$star >= 4 ? '' : '-outline'}}" wire:click="addStar(4)"></i>
                            <i class="item-rating pointer zmdi zmdi-star{{$star >= 5 ? '' : '-outline'}}" wire:click="addStar(5)"></i>
                        </span>
                    </div>

                    <input class="dis-none" wire:model='idUser' type="hidden" value={{$idUser}} />

                    <div class="row p-b-25">
                        <div class="col-12 p-b-5">
                            <label class="stext-102 cl3" for="review">Nội dung</label>
                            <textarea wire:model="content" class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                        </div>

                        <div class="col-sm-6 p-b-5">
                            <label class="stext-102 cl3" for="name">Tên</label>
                            <input disabled class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name" value={{Auth::user()->fullname}}>
                        </div>

                        <div class="col-sm-6 p-b-5">
                            <label class="stext-102 cl3" for="email">Email</label>
                            <input disabled class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email" value={{Auth::user()->email}}>
                        </div>
                    </div>

                    <button type="submit" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Đánh giá
                    </button>
                </form>

            @endif
        </div>
    </div>
</div>