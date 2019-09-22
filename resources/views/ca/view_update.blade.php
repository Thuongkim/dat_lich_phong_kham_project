@extends('layer.master')
@section('content')
<form class="form-horizontal" action="{{ route('ca.process_update') }}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="ma_ca" value="{{$ca->ma_ca}}">
	<div class="form-group">
		Giờ bắt đầu
		<input type="text" name="gio_bat_dau" class="form-control" value="{{$ca->gio_bat_dau}}">
	</div>
	<div class="form-group">
		Giờ kết thúc
		<input type="text" name="gio_ket_thuc" class="form-control" value="{{$ca->gio_ket_thuc}}">
	</div>
	<div class="form-group">
		<button class="btn btn-success">
			Sửa
		</button>
		<button class="btn btn-danger">
			<a href="{{ URL::previous() }}">
				Quay Lại
			</a>
		</button>
	</div>
</form>
@endsection
@push('js')
	<script type="text/javascript">
     	$(document).ready(function(){
     		$(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
     	});  
    </script>
@endpush