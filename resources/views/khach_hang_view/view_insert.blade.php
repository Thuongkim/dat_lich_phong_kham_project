@extends('layer.master')
@section('content')
<form class="form-horizontal" action="{{ route('khach_hang.process_insert') }}" method="post">
	{{csrf_field()}}
	<div class="form-group">
		Tên khách hàng
		<input type="text" name="ten_khach_hang" class="form-control">
	</div>
	<div class="form-group">
		SĐT
		<input type="number" name="sdt" class="form-control">
	</div>
	<div class="form-group">
		Email
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		Ngày sinh
		<input type="date" name="ngay_sinh" class="form-control">
	</div>
	<div class="form-group">
		Địa chỉ
		<input type="text" name="dia_chi" class="form-control">
	</div>
	<div class="form-group">
		Mật Khẩu
		<input type="text" name="mat_khau" class="form-control">
	</div>
	<div class="form-group">
		Giới tính
		<input type="number" name="gioi_tinh" class="form-control">
	</div>
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
</form>
@endsection