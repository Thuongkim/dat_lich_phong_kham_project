@extends('layer.master')
@section('content')
<form class="form-horizontal" action="{{ route('admin.process_update') }}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="ma_admin" value="{{$admin->ma_admin}}">
	<div class="form-group">
		Tên Admin
		<input type="text" name="ten_admin" class="form-control" value="{{$admin->ten_admin}}">
	</div>
	<div class="form-group">
		SĐT
		<input type="number" name="sdt" class="form-control" value="{{$admin->sdt}}">
	</div>
	<div class="form-group">
		Email
		<input type="text" name="email" class="form-control" value="{{$admin->email}}">
	</div>
	<div class="form-group">
		Địa chỉ
		<input type="text" name="dia_chi" class="form-control" value="{{$admin->dia_chi}}">
	</div>
	<div class="form-group">
		Mật Khẩu
		<input type="text" name="mat_khau" class="form-control" value="{{$admin->mat_khau}}">
	</div>
	<div class="form-group">
		Giới tính
		<div class="form-check">
			<input class="form-check-input" type="radio" name="gioi_tinh" id="exampleRadios1" checked="{{$admin->gioi_tinh}}" value="1">
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