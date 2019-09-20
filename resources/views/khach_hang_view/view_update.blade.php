@extends('layer.master')
@section('content')
<form class="form-horizontal" action="{{ route('khach_hang.process_update') }}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="ma_khach_hang" value="{{$khach_hang->ma_khach_hang}}">
	<div class="form-group">
		Tên khách hàng
		<input type="text" name="ten_khach_hang" class="form-control" value="{{$khach_hang->ten_khach_hang}}">
	</div>
	<div class="form-group">
		SĐT
		<input type="number" name="sdt" class="form-control" value="{{$khach_hang->sdt}}">
	</div>
	<div class="form-group">
		Email
		<input type="text" name="email" class="form-control" value="{{$khach_hang->email}}">
	</div>
	<div class="form-group">
		Ngày sinh
		<input type="text" name="ngay_sinh" class="form-control datepicker" id="datepicker" value="{{$khach_hang->ngay_sinh}}">
	</div>
	<div class="form-group">
		Địa chỉ
		<input type="text" name="dia_chi" class="form-control" value="{{$khach_hang->dia_chi}}">
	</div>
	<div class="form-group">
		Mật Khẩu
		<input type="text" name="mat_khau" class="form-control" value="{{$khach_hang->mat_khau}}">
	</div>
	<div class="form-group">
		Giới tính
		<div class="form-check">
			<input class="form-check-input" type="radio" name="gioi_tinh" id="exampleRadios1" checked="{{$khach_hang->gioi_tinh}}" value="1">
			Nam
		
			<input class="form-check-input" type="radio" name="gioi_tinh" id="exampleRadios2"  value="0">
			Nữ
		</div>
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
     		$('.datepicker').datetimepicker({format: 'L'});
     	});  
    </script>
@endpush