@extends('layer.master')
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="header">
			<caption>
				<h3>Danh sách khách hàng</h3>
			</caption>
		</div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<thead>
					<th>STT</th>
					<th>Tên khách hàng</th>
					<th>SĐT</th>
					<th>Email</th>
					<th>Ngày sinh</th>
					<th>Địa chỉ</th>
					<th>Mật khẩu</th>
					<th>Giới tính</th>
					<th>Chức năng</th>
				</thead>
				<tbody>
					@php
						$stt = 0;
					@endphp
					@foreach ($array as $khach_hang)
					<tr>
						<td>{{++$stt}}</td>
						<td>{{$khach_hang->ten_khach_hang}}</td>	
						<td>{{$khach_hang->sdt}}</td>	
						<td>{{$khach_hang->email}}</td>	
						<td>{{$khach_hang->ngay_sinh}}</td>	
						<td>{{$khach_hang->dia_chi}}</td>	
						<td>{{$khach_hang->mat_khau}}</td>	
						{{-- giới tính --}}
						@if ($khach_hang->gioi_tinh == 1) <td>Nam</td>
						@else  <td>Nữ</td>
						@endif

						<td class="td-actions text">
							<a href="{{ route('khach_hang.view_update', ['ma_khach_hang' => $khach_hang->ma_khach_hang]) }}">
								<button type="button" rel="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Sửa">
									<i class="fa fa-edit"></i>
								</button>
							</a>
							<a href="{{ route('khach_hang.delete', ['ma_khach_hang' => $khach_hang->ma_khach_hang]) }}">
								<button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Cấm">
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