@extends('layer_custom.master')
@section('content')
<div class="appointment-form-content">
	<div class="row no-gutters align-items-center">
		<div class="col-12 col-lg-9">
			<div class="medilife-appointment-form">
				<form action="{{ route('process_logup') }}" method="post">
					{{ csrf_field()}}
					<div class="row align-items-end">

						<div class="col-12 col-md-4">
							<div class="form-group">
								<input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="ten" id="name" value="{{ old('ten') }}"placeholder="Họ Tên">
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="form-group">
								<input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="sdt" id="number"
								value="{{ old('sdt') }}" placeholder="SĐT">
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="form-group">
								<input type="email" class="form-control border-top-0 border-right-0 border-left-0" name="email" value="{{ old('email') }}" id="email" placeholder="E-mail">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" name="ngay_sinh" value="{{ old('ngay_sinh') }}" id="date" placeholder="Ngày Sinh" data-provide="datepicker">
							</div>
						</div>
						<div class="col-12 col-md-6" style="color: #868e96">
							Giới Tính 
							<div class=" col-3 col-md-3 offset-md-1 form-group form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gioi_tinh" id="inlineRadio1" value="1" checked>
								<label class="form-check-label" for="inlineRadio1">Nam</label>
							</div>
							<div class="form-group form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gioi_tinh" id="inlineRadio2" value="2">
								<label class="form-check-label" for="inlineRadio2">Nữ</label>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<input type="password" class="form-control" name="mat_khau" id="mat_khau" placeholder="Mật Khẩu">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<input type="password" class="form-control" name="mat_khau_nhap_lai" id="mat_khau_nhap_lai" placeholder="Nhập Lại Mật Khẩu" >
							</div>
						</div>
						<div class="col-12 col-md-7">
							<div class="form-group mb-0">
								<textarea class="form-control mb-0 border-top-0 border-right-0 border-left-0" name="dia_chi" cols="30" rows="10" placeholder="Địa chỉ">{{ old('dia_chi') }}</textarea>
							</div>
						</div>
						<div class="col-12 col-md-5 mb-0">
							<div class="form-group mb-0">
								<button type="submit" class="btn medilife-btn">Đăng Kí <span>+</span></button>
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
@push('js')
<script type="text/javascript">
	$('#date').datepicker({ 
		todayBtn: "linked",
		language: "vi",
		todayHighlight: true,
		orientation: "top right",
		format: "yyyy-mm-dd",
	});
</script>
@endpush