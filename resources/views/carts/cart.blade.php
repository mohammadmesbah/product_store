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
                    <h3>Cart</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('shop.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
        @if($cartItems->count()>0)
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cartItems as $item)
                        
                            <tr>
                                <td>
                                    <a href="{{route('products.show',$item->model->slug)}}">
                                        <img src="{{asset('assets/images/fashion/product/front')}}/{{$item->model->image_one}}" class="blur-up lazyloaded"
                                            alt="{{$item->model->name}}">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('products.show',$item->model->slug)}}">{{$item->model->name}}</a>
                                    <div class="mobile-cart-content row">
                                        {{-- <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                        value="1">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col">
                                            <h2>${{$item->price}}</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>${{$item->price}}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" data-rowid="{{$item->rowId}}"
                                            onchange="updateQuantity(this)"    
                                            class="form-control input-number" value="{{$item->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">${{$item->subtotal()}}</h2>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="deleteCartItem('{{$item->rowId}}')">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
    
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="javascript:void(0)" onclick="deleteCart()"
                                    class="text-decoration-underline theme-color d-block text-capitalize">clear
                                    all items</a>
                            </div>
                        </div>
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="{{route('shop.index')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="promo-section">
                                <form class="row g-3">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="number" placeholder="Coupon Code">
                                    </div>
                                    <div class="col-5">
                                        <button class="btn btn-solid-default rounded btn">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 ">
                            <div class="checkout-button">
                                <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                    Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Totals</h3>
                                            <h6>Sub Total <span>${{Cart::instance('cart')->subtotal()}}</span></h6>
                                            <h6>Tax <span>${{Cart::instance('cart')->tax()}}</span></h6>

                                            <h6>Total <span>${{Cart::instance('cart')->total()}}</span></h6>
                                        </div>
                                        <div class="bottom-details">
                                            <a href="checkout">Process Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Cart is Empty</h3>
                <h5 class="mt-3">Add items to get started</h5>
                <a href="{{route('shop.index')}}" class="btn btn-solid-default btn fs-3 mt-5 ms-0">Shopping Now</a>
            </div>
        </div>
        @endif
        </div>
    </section>

    <form action="{{route('carts.update',0)}}" method="post" id="addtocart">
        @csrf
        @method('PUT')

        <input type="hidden" name="rowId" id="rowId">
        <input type="hidden" name="quantity" id="quantity">
    </form>

    <form id="deleteCartItem" action="{{route('carts.destroy',0)}}" method="post">
        @csrf
        @method('DELETE')

        <input type="hidden" name="rowId" id="rowId2">
        <input type="hidden" name="destroyCheck" value="1">
    </form>

    <form id="deleteCart" action="{{route('carts.destroy',0)}}" method="post">
        @csrf
        @method('DELETE')

    </form>
@endsection
@push('scripts')
    <script>
    function updateQuantity(qty) {
        $('#rowId').val($(qty).data('rowid'));
        $('#quantity').val($(qty).val());
        $('#addtocart').submit();
    }

    function deleteCartItem(rowId) {
        $('#rowId2').val(rowId);
        $('#deleteCartItem').submit();
    }

    function deleteCart() {
        $('#deleteCart').submit();
    }
    </script> 
@endpush