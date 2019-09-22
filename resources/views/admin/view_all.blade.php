@extends('layer.master')
@section('content')

<div class="col-md-12">
	<div class="card">
		<div class="header">
			<caption>
				<a href="{{ route('admin.view_insert') }}">
					<button class="btn btn-success">
						Thêm admin
					</button>
				</a>
			</caption>
		</div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<thead>
					<th>STT</th>
					<th>Tên Admin</th>
					<th>SĐT</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Mật khẩu</th>
					<th>Giới tính</th>
					<th>Chức năng</th>
				</thead>
				<tbody>
					@php
						$stt = 0;
					@endphp
					@foreach ($array as $admin)
					<tr>
						<td>{{++$stt}}</td>
						<td>{{$admin->ten_admin}}</td>
						<td>{{$admin->sdt}}</td>		
						<td>{{$admin->email}}</td>	
						<td>{{$admin->dia_chi}}</td>	
						<td>{{$admin->mat_khau}}</td>
						{{-- giới tính --}}
						@if ($admin->gioi_tinh == 1) <td>Nam</td>
						@else  <td>Nữ</td>
						@endif

						<td class="td-actions text">
							<a href="{{ route('admin.view_update', ['ma_admin' => $admin->ma]) }}">
								<button type="button" rel="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Sửa">
									<i class="fa fa-edit"></i>
								</button>
							</a>
							<a href="{{ route('admin.delete', ['ma_admin' => $admin->ma]) }}">
								<button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Xóa">
									<i class="fa fa-times"></i>
								</button>
							</a>

						</td>	
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>

@endsection