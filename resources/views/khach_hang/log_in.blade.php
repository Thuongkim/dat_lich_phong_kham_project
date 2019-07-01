@extends('layer_custom.master')
@section('content')
<div class="appointment-form-content">
	<div class="row no-gutters align-items-center">
		<div class="col-12 col-lg-9">
			<div class="medilife-appointment-form">
				<form action="{{ route('process_login') }}" method="post">
					{{ csrf_field() }}
					<div class="row align-items-end">
						<div class="col-12 col-md-7">
							<div class="form-group">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="E-mail">
							</div>
						</div>
						<div class="col-12 col-md-7">
							<div class="form-group">
								<input type="password" class="form-control" name="mat_khau" id="mat_khau" placeholder="Mật Khẩu">
							</div>
						</div>
						<div class="col-12 col-md-12 mb-0">
							<div class="form-group mb-0">
								<button type="submit" class="btn medilife-btn">Đăng Nhập<span>+</span></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-12 col-lg-3">
			<div class="medilife-contact-info">
				<!-- Single Contact Info -->
				<div class="single-contact-info mb-30">
					<img src="img/icons/alarm-clock.png" alt="">
					<p>Mon - Sat 08:00 - 21:00 <br>Sunday CLOSED</p>
				</div>
				<!-- Single Contact Info -->
				<div class="single-contact-info mb-30">
					<img src="img/icons/envelope.png" alt="">
					<p>0080 673 729 766 <br>contact@business.com</p>
				</div>
				<!-- Single Contact Info -->
				<div class="single-contact-info">
					<img src="img/icons/map-pin.png" alt="">
					<p>Lamas Str, no 14-18 <br>41770 Miami</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection