@extends('layer.master')
@section('content')
	<div class="card card-calendar">
        <div class="content">
            <div id="fullCalendar"></div>
			<div style="display: none;" class="modal" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Chọn ca làm việc</h5>
			      </div>
			      <form action="{{ route('them_ngay_lam_viec') }}" method = "post">
			      	{{ csrf_field()}}
			      	<input type="hidden" name="ngay" id="ngay">
			      <div id="main_them_lich" class="modal-body">
			        
			      </div>
			      <div class="modal-footer">
			        <button onclick="closeForm()" type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
			        <button type="submit" class="btn btn-primary">Lưu</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
        </div>
    </div>

@endsection
@push('js')
<script src='{{ asset('js/jsadmin/moment.js') }}'></script>
<script src='{{ asset('js/jsadmin/vn.js') }}'></script>
<script src='{{ asset('js/jsadmin/fullcalendar.min.js') }}'></script>
<script>
	$(document).ready(function(){
		var dateObj   = new Date();
		var momentObj = moment(dateObj);

		var start_day = new Date(dateObj);
	    start_day.setDate(0);
	    start_day.setDate(1);
		var end_day = new Date(dateObj.getFullYear(), dateObj.getMonth() + 2, 0);
		$('#fullCalendar').fullCalendar({
			height: 550,
			locale: 'vi',
			defaultView: 'month',
			validRange: {
			    start: start_day,
			    end: end_day
			},
			defaultDate: momentObj,
			showNonCurrentDates: true,
			header:{
				left:   'title',
			  	center: 'today,prev,next',
			  	right:  'month,listMonth'
			},
			events: {
			    url: '{{ route('get_calendar_ngay_lam_viec') }}',
			    type: 'GET'
		  	},
		  	selectable: true,
		  	dayClick: function(date) {
				var xhttp = new XMLHttpRequest();
				var ngay = date.format();
				xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("main_them_lich").innerHTML =
					this.responseText;
					$('#ngay').val(date.format());
					document.getElementById("form").style.display = "block";
					}
					
				};
					xhttp.open("GET", 'ajax/them/'+ ngay, true);
					xhttp.send();
	        },
		});
	})
function closeForm(){
	document.getElementById("form").style.display = "none";
}
</script>
@endpush