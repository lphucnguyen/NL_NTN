<div class="container">
	<div class="flex-w flex-sb-m p-b-52">
		<div class="flex-w flex-l-m filter-tope-group m-tb-10">
			<h3 class="mtext-109 cl2 p-b-30 txt-center">SẢN PHẨM CỬA HÀNG</h3>
		</div>

		<div class="flex-w flex-c-m m-tb-10">
			<div wire:click="showFilter" class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4">
				<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
				<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
				Bộ lọc
			</div>

			<div wire:click="showSearch" class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4">
				<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
				<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
				Tìm kiếm
			</div>
		</div>

		<!-- Search product -->
		<div class="{{$isShowSearch ? 'dis-block' : 'dis-none'}} panel-search w-full p-t-10 p-b-15">
			<div class="bor8 dis-flex p-l-15">
				<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
					<i class="zmdi zmdi-search"></i>
				</button>

				<input wire:model="search" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" placeholder="Search">
			</div>
		</div>

		<!-- Filter -->
		<div class="{{$isShowFilter ? 'dis-block' : 'dis-none'}} panel-filter w-full p-t-10">
			<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
				<div class="filter-col1 p-r-15 p-b-27">
					<div class="mtext-102 cl2 p-b-15">
						Sắp xếp theo
					</div>

					<ul>
						<li class="p-b-6">
							<button 
								wire:click="filterSortBy('all')"
								class="filter-link stext-106 trans-04 {{ $sortBy == 'all' ? 'filter-link-active' : '' }}"
							>
								Mặc định
							</button>
						</li>

						<li class="p-b-6">
							<button 
								wire:click="filterSortBy('newest')"
								class="filter-link stext-106 trans-04 {{ $sortBy == 'newest' ? 'filter-link-active' : '' }}"
							>
								Mới nhất
							</button>
						</li>

					</ul>
				</div>

				<div class="filter-col2 p-r-15 p-b-27">
					<div class="mtext-102 cl2 p-b-15">
						Giá
					</div>

					<ul>
						<li class="p-b-6">
							<button wire:click="filterPrice('all')" class="filter-link stext-106 trans-04 {{$priceFilter == 'all' ? 'filter-link-active' : ''}}">
								Tất cả
							</button>
						</li>

						<li class="p-b-6">
							<button wire:click="filterPrice('0-10000000')" class="filter-link stext-106 trans-04 {{$priceFilter == '0-10000000' ? 'filter-link-active' : ''}}">
								0 - 10.000.000 VND
							</button>
						</li>

						<li class="p-b-6">
							<button wire:click="filterPrice('10000000-20000000')" class="filter-link stext-106 trans-04 {{$priceFilter == '10000000-20000000' ? 'filter-link-active' : ''}}">
								10.000.000 - 20.000.000
							</button>
						</li>

						<li class="p-b-6">
							<button wire:click="filterPrice('20000000-30000000')" class="filter-link stext-106 trans-04 {{$priceFilter == '20000000-30000000' ? 'filter-link-active' : ''}}">
								20.000.000 - 30.000.000
							</button>
						</li>

						<li class="p-b-6">
							<button wire:click="filterPrice('30000000-40000000')" class="filter-link stext-106 trans-04 {{$priceFilter == '30000000-40000000' ? 'filter-link-active' : ''}}">
								30.000.000 - 40.000.000
							</button>
						</li>

						<li class="p-b-6">
							<button wire:click="filterPrice('40000000+')" class="filter-link stext-106 trans-04 {{$priceFilter == '40000000+' ? 'filter-link-active' : ''}}">
								40.000.000 trở lên
							</button>
						</li>
					</ul>
				</div>

				<div class="filter-col3 p-r-15 p-b-27">
					<div class="mtext-102 cl2 p-b-15">
						Sắp xếp theo giá
					</div>

					<ul>

						<li class="p-b-6">
							<button wire:click="filterSortByPrice('all')" class="filter-link stext-106 trans-04 {{$sortByPrice == 'all' ? 'filter-link-active' : ''}}">
								Mặc định
							</button>
						</li>

						<li class="p-b-6">
							<button wire:click="filterSortByPrice('asc')" class="filter-link stext-106 trans-04 {{$sortByPrice == 'asc' ? 'filter-link-active' : ''}}">
								Thấp đến cao
							</button>
						</li>

						<li class="p-b-6">
							<button wire:click="filterSortByPrice('desc')" class="filter-link stext-106 trans-04 {{$sortByPrice == 'desc' ? 'filter-link-active' : ''}}">
								Cao đến thấp
							</button>
						</li>

					</ul>
				</div>

				<div class="filter-col4 p-b-27">
					<div class="mtext-102 cl2 p-b-15">
						Loại sản phẩm
					</div>

					<ul>
						<li class="p-b-6">
							<button wire:click="filterByCategory(0)" class="filter-link stext-106 trans-04 {{ $categoryFilter == 0 ? 'filter-link-active' : '' }}">
								Tất cả
							</button>
						</li>
						@foreach($categories as $category)
						<li wire:key={{'category' . $category->id}} class="p-b-6">
							<button wire:click="filterByCategory({{$category->id}})" class="filter-link stext-106 trans-04 {{ $categoryFilter == $category->id ? 'filter-link-active' : '' }}">
								{{$category->name_type}}
							</button>
						</li>
						@endforeach
					</ul>
				</div>

			</div>
		</div>
	</div>

	<div class="row">

		@if(!empty($products))
		@foreach($products as $product)
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
			<!-- Block2 -->
			<div class="block2">
				<div class="block2-pic hov-img0">
					<img src="{{asset(count($product->images) > 0 ? '/images/products/' . $product->images[0]->name : 'client_template/images/product-1.png')}}" alt="IMG-PRODUCT">
					<button
						type="button"
						wire:click="$emit('viewProduct', {{ $product->id }})"
						class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
					>
						Xem nhanh
					</button>
				</div>

				<div class="block2-txt flex-w flex-c p-t-14">
					<div class="block2-txt-child1 flex-col-l ">
						<a href="/home/product_detail/{{$product->id}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							{{ $product->name }}
						</a>

						<span class="stext-105 cl3">
							{{ number_format($product->price, 3, '.', ',') }} VND
						</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@endif

		@if(count($products) == 0)
		<div class="col-12">
			<h4 class="smtext-109 cl2 p-b-30 txt-center">Không tìm thấy sản phẩm</h4>
		</div>
		@endif
	</div>

	<div wire:loading wire:target="loadMore" class="txt-center ">
		Loading...
	</div>
	<!-- Load more -->
	@if(!$isNoLoadMore)
	<div class="flex-c-m flex-w w-full p-t-45">
		<button type="button" wire:click="loadMore" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
			Hiển thị thêm
		</button>
	</div>
	@endif

</div>