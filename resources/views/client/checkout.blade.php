@extends('client_layout.client')

@section('title')
	checkout
@endsection
	
@section('content')
	<!-- start content -->
	
	<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">

				<form action="{{URL::to ('/postCheckout')}}" method="POST" class="billing-form">
					@csrf
					
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-12">
							<div class="form-group">
								<label for="firstname">Full Name</label>
							<input type="text" class="form-control" name="name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="lastname">Address</label>
							<input type="text" class="form-control"  name="address">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Buy Now">
							</div>
						</div>
					</div>
					
	          </form><!-- END -->

					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						@if ((Session::has('cart')))
									<span>{{Session::get('cart')->totalPrice}} $</span>
									@else
									<span>0.00 $</span>
									@endif

		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						@if ((Session::has('cart')))
									<span>{{Session::get('cart')->totalPrice}} $</span>
									@else
									<span>0.00 $</span>
									@endif

		    					</p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->


	<!-- end content  -->

	@endsection

	@include('client_layout.cart&checkout_script')