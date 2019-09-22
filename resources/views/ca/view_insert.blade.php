@extends('layer.master')
@section('content')
<form class="form-horizontal" action="{{ route('ca.process_insert') }}" method="post">
	{{csrf_field()}}
		<div class="container">

</div>
	<div class="col-md-5">
		<div class="form-group ">
			Giờ bắt đầu
			<input type="text" class="form-control timepicker" id="timepicker" placeholder="Giờ bắt đầu"/>
		</div>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-5">
		<div class="form-group">
			Giờ kết thúc
			<input type="text" class="form-control timepicker" id="timepicker" placeholder="Giờ kết thúc"/>
		</div>
	</div>
	<div class="col-md-12">
	<div class="form-group">
		<button class="btn btn-success">
			Thêm
		</button>
		<button class="btn btn-danger">
			<a href="{{ URL::previous() }}">
				Quay Lại
			</a>
		</button>
	</div>
	</div>
</form>
@endsection
@push('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('input.timepicker').timepicker({});
		});
	</script>
@endpush
