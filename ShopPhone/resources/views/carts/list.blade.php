@extends('main')

@section('content')
{{--    {{dd($carts)}}--}}
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="/">Home</a>
                        <i>|</i>
                    </li>
                    <li>Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>G</span>iỏ Hàng
            </h3>
            <!-- //tittle heading -->
            @php
                $total=0;
            @endphp
            @if (count($products)!=0)
            <div class="checkout-right">
                <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                    <span>{{count($products)}}</span>
                </h4>
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key=>$product)
                            @php
                                $priceEnd=$product->DonGia * $carts[$product->id];
                                $total+=$priceEnd;
                            @endphp
                        <tr class="rem1">
                            <td class="invert">1</td>
                            <td class="invert-image">
                                <a href="single.html">
                                    <img src="{{$product->image}}" alt=" " class="img-responsive" width="50px" height="100px">
                                </a>
                            </td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus">&nbsp;</div>
                                        <div class="entry value">
                                            <span>{{$carts[$product->id]}}</span>
                                        </div>
                                        <div class="entry value-plus active">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="invert">{{$product->name}}</td>
                            <td class="invert">{{$product->DonGia}}</td>
                            <td class="invert">{{$priceEnd}}</td>
                            <td class="invert">
                                <div class="rem">
                                    <div class="close1"> </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <h4 class="mb-sm-4 mb-3">Tổng tiền: {{number_format($total, 0, '', '.')}}</h4>
                    </table>
                </div>
            </div>
            @else
                <div class="text-center"><h2 class="mb-sm-4 mb-3">Giỏ hàng trống</h2></div>
            @endif
            <div class="checkout-left">
                <div class="address_form_agile mt-sm-5 mt-4">
                    <h4 class="mb-sm-4 mb-3">Add a new Details</h4>
                    <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="controls form-group">
                                        <input class="billing-address-name form-control" type="text" name="name" placeholder="Full Name" required="">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Mobile Number" name="number" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Landmark" name="landmark" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls form-group">
                                        <input type="text" class="form-control" placeholder="Town/City" name="city" required="">
                                    </div>
                                    <div class="controls form-group">
                                        <select class="option-w3ls">
                                            <option>Select Address type</option>
                                            <option>Office</option>
                                            <option>Home</option>
                                            <option>Commercial</option>

                                        </select>
                                    </div>
                                </div>
                                <button class="submit check_out btn">Delivery to this Address</button>
                            </div>
                        </div>
                    </form>
                    <div class="checkout-right-basket">
                        <a href="payment.html">Make a Payment
                            <span class="far fa-hand-point-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
