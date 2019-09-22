@extends('layer_custom.master')
@section('content')
<div class="appointment-form-content">
	<div class="row no-gutters align-items-center">
		<div class="col-12 col-lg-9">
			<div class="medilife-appointment-form">
				<div class="row align-items-end">
					<div class="col-12 col-md-12 mb-0">
						<div class="form-group mb-0">
							<button onclick="loc()" class="btn medilife-btn">Lọc</button>
						</div>
					</div>
				</div>
				<br>
				<form action="{{ route('lich_hen') }}" method="post">
					@csrf
					<div class="row align-items-end">
						<div class="col-12 col-md-4">
							<input type="hidden" value="<?php date('Y-m-d') ?>" id="getDate">
							<div id="main_date" class="form-group">
								<input id="date" value="<?php echo date('Y-m-d') ?>" type="text" class="form-control" name="date" data-provide="datepicker">
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="form-group">
								<select id="main_ca" class="form-control" name="ca">
									<option selected disabled>chon ca</option>
									@if (isset($array_ca))
									@foreach($array_ca as $value)
									<option value="{{$value->ma_ca}}">{{ $value->gio_bat_dau }}-{{$value->gio_ket_thuc}}</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div id="main_bac_si" class="form-group">
								<select onchange="getNgay()" id="maBacSi" class="form-control" name="bac_si">
									@if (isset($bac_si))
									@foreach($bac_si as $value)
									<option value="{{$value->ma_bac_si}}">{{ $value->ten_bac_si }}</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="col-12 col-md-7">
							<div class="form-group mb-0">
								<textarea name="ghi_chu" class="form-control mb-0 border-top-0 border-right-0 border-left-0" id="ghi_chu" cols="30" rows="10" placeholder="Ghi chú bệnh"></textarea>
							</div>
						</div>
						<div class="col-12 col-md-5 mb-0">
							<div class="form-group mb-0">
								<button type="submit" class="btn medilife-btn">Lên Lịch Hẹn<span>+</span></button>
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
	var date = new Date();
	date.setDate(date.getDate());
	$('#date').datepicker({ 
		startDate: date,
		todayBtn: "linked",
		language: "vi",
		todayHighlight: true,
		orientation: "top right",
		format: "yyyy-mm-dd",
	});

	function loc(){
		var getDate = $("#getDate").val();
		var date = $("#date").val();
		var ca = $("#main_ca").val();
		var maBacSi = $("#maBacSi").val();

		if(date != getDate && ca == "all"){
			//loc theo ngay
			$.get("ajax/getBacSiByDate/"+date,function(data){
				$("#main_bac_si").html(data);	
			});
		}else if(date != getDate && ca != "all"){
			//loc theo ngay va ca
			$.get("ajax/getBacSiByDateAndCa/"+date+"/"+ca,function(data){
				$("#main_bac_si").html(data);	
			});
		}else if(date == getDate && ca != "all"){
			//loc theo ca
			$.get("ajax/getBacSiByCa/"+ca,function(data){
				$("#main_bac_si").html(data);	
			});
		}
		// else if(ca == null && maBacSi != null){
		// 	$.get("ajax/getDateByDoctorId/"+maBacSi,function(data){
		// 		$("#main_date").html(data);	
		// 	});
		// }else if(ca != null && maBacSi != null){
		// 	$.get("ajax/getDateByDoctorIdAndCa/"+maBacSi+"/"+ca,function(data){
		// 		$("#main_date").html(data);	
		// 	});
		// }
		else{
			alert("ko ok");
		}
	}

	function getNgay(){
		var main_ca = $("#main_ca").val();
		var maBacSi = $("#maBacSi").val();
		if(main_ca == null){
			$.get("ajax/getDateByDoctorId/"+maBacSi,function(data){
				$("#main_date").html(data);	
			});
		}else{
			$.get("ajax/getDateByDoctorIdAndCa/"+maBacSi+"/"+main_ca,function(data){
				$("#main_date").html(data);	
			});
		}
	}

</script>
@endpush
