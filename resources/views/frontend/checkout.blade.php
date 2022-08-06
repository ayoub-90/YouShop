@extends('layouts.frontend')
@section('title')
    Checkout
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top" style="margin-top: 60px;">
    <div class="container">
       <h6 class="mb-8">
           <a href="{{ url('/') }}">
              home
           </a>/
           <a href="#">
                checkout
           </a>
    </div>
</div>
    <div class="container" style="margin-top: 70px">
        <form action="{{url('place-order')}}" method="POST">
            <div class="row">
                <div class="col-md-7">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <label for="firstName">First Name </label>
                                    <input type="text" class="form-control fname" value="{{Auth::user()->fname}}" name="fname" placeholder="Enter First Name">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control lname" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Last Name">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" value="{{Auth::user()->email}}" name="email" placeholder="Enter Email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                {{-- Number phone --}}
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="tel" class="form-control phoneno" value="{{Auth::user()->phone}}" name="phoneno" placeholder="Enter Phone Number">
                                    <span id="phoneno_error" class="text-danger"></span>
                                </div>
                                {{-- end of Number phone --}}
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control adress1" value="{{Auth::user()->adress1}}" name="adress1" placeholder="Enter Address 1">
                                    <span id="adress1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control adress2" value="{{Auth::user()->adress2}}" name="adress2" placeholder="Enter Address 2">
                                    <span id="adress2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">city</label>
                                    <input type="text" class="form-control city" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control State" value="{{Auth::user()->state}}" name="State" placeholder="Enter State">
                                    <span id="State_error" class="text-danger"></span>
                                </div>
                                {{-- Country --}}
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control country" value="{{Auth::user()->country}}" name="country" placeholder="Enter Coutry">
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                {{-- end of Country --}}
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" class="form-control pincode" value="{{Auth::user()->pincode}}" name="pincode" placeholder="Enter Pin Code">
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card shadow">
                        <div class="card-body">
                            Order Details
                        </div>
                        <hr>
                        @if ($cartitems->count() > 0)
                        @php $totale = 0; @endphp
                            <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartitems as $item)

                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->products->selling_price }}</td>
                                        </tr>
                                        @php $totale += $item->products->selling_price * $item->prod_qty @endphp
                                        @endforeach
                                    </tbody>
                            </table>

                                <h6 class="px-2">Grand Total <span class="float-end">{{$totale}}</span></h6>
                            <hr>
                            <input type="hidden" name="payement_mode" value="COD">
                            <button type="submit" class="btn btn-dark w-100" >Place Order | COD</button>
                            <button type="button" class="btn btn-primary w-100 mt-3 razorpay-btn">Pay with razorpay</button>
                            <div class="mt-3" id="paypal-button-container"></div>
                        @else
                        <div class="card-body text-center">
                            <h2><i class="fa fa-exclamation"></i>  No product in cart</h2>

                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('script')
<script src="https://www.paypal.com/sdk/js?client-id=Aa3BPd0XA7Nzd9tG9vYc-WIf1JDYEboJWz1CobzM5zgLjgYLVVUIiLVo9q1QS2VHinabfVkFpEqlQPA8"></script>
    <!-- Set up a container element for the button -->
    <script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{$totale}}' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            var fname = $(".fname").val();
            var lname = $(".lname").val();
            var email = $(".email").val();
            var phoneno = $(".phoneno").val();
            var adress1 = $(".adress1").val();
            var adress2 = $(".adress2").val();
            var city = $(".city").val();
            var State = $(".State").val();
            var country = $(".country").val();
            var pincode = $(".pincode").val();
            $.ajax({
                                type: "POST",
                                url: "/place-order",
                                data: {
                                    fname: fname,
                                    lname: lname,
                                    email: email,
                                    phone: phoneno,
                                    address1:address1,
                                    address2:address2,
                                    city: city,
                                    state:state,
                                    country:country,
                                    pincode:pincode,
                                    payement_mode: "payed by Paypale",
                                    payement_id: orderData.id,
                                },
                                success: function (response) {
                                    alert(response.status);
                                    window.location.href ="/my-orders"
                                },
                            });
          });
        }
      }).render('#paypal-button-container');
    </script>
@endsection
