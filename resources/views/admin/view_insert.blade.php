@extends('layer.master')
@section('content')

<form class="form-horizontal" action="{{ route('admin.process_insert') }}" method="post">
	{{csrf_field()}}
	<div class="col-sm-6" style="padding-right: 25px">
		<div class="form-group">
			Tên admin
			<input type="text" name="ten_admin" class="form-control">
		</div>
		<div class="form-group">
			SĐT
			<input type="number" name="sdt" class="form-control">
		</div>
		<div class="form-group">
			Email
			<input type="text" name="email" class="form-control">
		</div>
	</div>
	<div class="col-sm-6" style="padding-left: 25px">
		<div class="form-group">
			Địa chỉ
			<input type="text" name="dia_chi" class="form-control">
		</div>
		<div class="form-group">
			Mật Khẩu
			<input type="password" name="mat_khau" class="form-control">
		</div>
		<div class="form-group">
			Giới tính
			<div class="form-check">
				<input class="form-check-input" type="radio" name="gioi_tinh" id="exampleRadios1" value="1" checked>
				Nam

				<input class="form-check-input" type="radio" name="gioi_tinh" id="exampleRadios2" value="0">
				Nữ
			</div>
		</div>
	</div>
	<div class="col-sm-12">
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