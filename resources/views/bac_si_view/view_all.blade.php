@extends('layer.master')
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="header">
			<caption>
				<h3>Danh sách bác sĩ</h3>
				<a href="{{ route('bac_si.view_insert') }}">
					<button class="btn btn-success">
						Thêm bác sĩ
					</button>
				</a>
			</caption>
		</div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<thead>
					<th>Stt</th>
					<th>Tên bác sĩ</th>
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
					@foreach ($array as $bac_si)
					<tr>
						<td>{{++$stt}}</td>		
						<td>{{$bac_si->ten_bac_si}}</td>		
						<td>{{$bac_si->sdt}}</td>		
						<td>{{$bac_si->email}}</td>	
						<td>{{$bac_si->dia_chi}}</td>	
						<td>{{$bac_si->mat_khau}}</td>
						{{-- giới tính --}}
						@if ($bac_si->gioi_tinh == 1) <td>Nam</td>
						@else  <td>Nữ</td>
						@endif

						<td class="td-actions text">
							<a href="{{ route('bac_si.view_update', ['ma_bac_si' => $bac_si->ma_bac_si]) }}">
								<button type="button" rel="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Sửa">
									<i class="fa fa-edit"></i>
								</button>
							</a>
							<a href="{{ route('bac_si.delete', ['ma_bac_si' => $bac_si->ma_bac_si]) }}">
								<button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Xóa">
									<i class="fa fa-times"></i>
								</button>
							</a>

						</td>	
					</tr>	
				</tr>
				@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>
	
@endsection