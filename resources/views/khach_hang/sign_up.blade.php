@extends('layer_custom.master')
@section('content')
<div class="appointment-form-content">
	<div class="row no-gutters align-items-center">
		<div class="col-12 col-lg-9">
			<div class="medilife-appointment-form">
				<form action="#" method="post">
					<div class="row align-items-end">
						<div class="col-12 col-md-4">
							<div class="form-group">
								<input type="text" onchange="getDate()" class="form-control" name="date" id="date" placeholder="Ngày Hẹn" data-provide="datepicker">
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div id="main_ca" class="form-group">
								<select onchange="byCa()" disabled class="form-control" id="ca" name="ca">
									@foreach($array_ca as $ca)
									<option value="{{$ca->ma_ca}}">{{ $ca->gio_bat_dau }}-{{ $ca->gio_ket_thuc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div id="main_bac_si" class="form-group">
								<select class="form-control" name="bac_si">
									@foreach($bac_si as $value)
									<option value="{{$value->ma_bac_si}}">{{ $value->ten_bac_si }}</option>
									@endforeach
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
	function getDate(){
		var date = $('#date').val();
		// if(date!=""){
		// 	$("#ca").removeAttr("disabled");
		// }else{
		// 	$("#ca").attr("disabled","");
		// }
		$("#ca").removeAttr("disabled");
		// $('#date').change(function(){
		// 	if($(this).is(':selected')){
		// 		$("#ca").removeAttr("disabled");
		// 	}else{
		// 		$("#ca").attr("disabled","");
		// 	}
		// });	
		$.get("ajax/getBacSiByDate/"+date,function(data){
			$("#main_bac_si").html(data);			
		});
	};
	function byCa(){
		var maCa = $('#ca').val();
		var date = $('#date').val();
		$.get("ajax/getBacSiByCa/"+maCa+"/"+date,function(data){
			$("#main_bac_si").html(data);
		});
	};
	

</script>
@endpush
