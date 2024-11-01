@extends('layouts.base')

@section('content')

<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container"> 
        <div class="row">
            <div class="col-12">
                <h3>Wishlist</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('shop.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section Start -->
<section class="wish-list-section section-b-space">
    <div class="container">
@if ($items->count() > 0)
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table cart-table wishlist-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
@foreach ($items as $item)
    

        <tr>
            <td>
                <a href="details.php">
                    <img src="{{asset('assets/images/fashion/product/front')}}/{{$item->model->image_one}}"
                        class=" blur-up lazyload" alt="">
                </a>
            </td>
            <td>
                <a href="details.php" class="font-light">{{$item->model->name}}</a>
                {{-- <div class="mobile-cart-content row">
                    <div class="col">

                    @if($item->model->stock_status == 'instock')
                        <p>In Stock</p>
                    @else
                        <p>out of Stock</p>
                    @endif

                    </div>
                    <div class="col">
                        <p class="fw-bold">$ {{$item->model->sale_price}}</p>
                    </div>
                    <div class="col">
                        <h2 class="td-color">
                            <a href="javascript:void(0)" class="icon">
                                <i class="fas fa-times"></i>
                            </a>
                        </h2>
                        <h2 class="td-color">
                            <a href="cart.php" class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </h2>
                    </div>
                </div> --}}
            </td>
            <td>
                <p class="fw-bold">${{$item->model->sale_price}}</p>
            </td>
            <td>
                @if($item->model->stock_status == 'instock')
                        <p>In Stock</p>
                @else
                        <p>out of Stock</p>
                @endif
            </td>
            <td>

                @if($item->model->stock_status == 'instock')
                    <a href="javascript:void(0)" class="icon" 
                        onclick= "addToCart('{{$item->rowId}}')"{{-- "event.preventDefault(); document.getElementById('addtocart').submit();" --}}>

                        <i class="fas fa-shopping-cart"></i>

                        {{-- <form id="addtocart" method="post" action="{{route('carts.store')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->model->id}}">
                            <input type="hidden" name="quantity" id="qty">
                        </form> --}}

                    </a>
                @else
                    <a href="javascript:void(0)" class="icon" onclick= "" @disabled(true)>
                    <i class="fas fa-shopping-cart"></i>
                    </a>
                @endif
                <a href="javascript:void(0)" class="icon" onclick="deleteWishlistItem('{{$item->rowId}}')">
                    <i class="fas fa-times"></i>
                </a>
            </td>
        </tr> 
@endforeach                         
                    </tbody>
                </table>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="#" onclick="deleteWishlist()" class="text-decoration-underline theme-color d-block text-capitalize">
                clear wishlist</a>
        </div>
    </div>
@else
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="wishlist-empty">
                    <h2 class="theme-color">Your wishlist is empty.</h2>
                    <h5 class="mt-3">Add items to get started</h5>
                    <a href="{{route('shop.index')}}" class="btn btn-solid-default btn fs-3 mt-5 ms-0">Shopping Now</a>
                </div>
            </div>
        </div>
@endif
    </div>
</section>
<!-- Cart Section End --> 

<form id="deleteWishlistItem" action="{{route('wishlists.destroy',0)}}" method="post">
    @csrf
    @method('DELETE')

    <input type="hidden" name="rowId" id="rowId2">
    <input type="hidden" name="destroyCheck" value="1">
</form>

<form id="deleteWishlist" action="{{route('wishlists.destroy',0)}}" method="post">
    @csrf
    @method('DELETE')

</form>

<form id="addtocart" action="{{route('wishlists.update',0)}}" method="post">
    @csrf
    @method('PUT')

    <input type="hidden" name="rowId" id="rowId">
</form>

@endsection

@push('scripts')

    <script>
        function deleteWishlistItem(rowId) {
            $('#rowId2').val(rowId);
            $('#deleteWishlistItem').submit();
        }

        function deleteWishlist() {
            $('#deleteWishlist').submit();
        }

        function addToCart(rowId) {
            $('#rowId').val(rowId);
            $('#addtocart').submit();
        }
    </script>
    
@endpush