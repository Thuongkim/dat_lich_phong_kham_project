@extends('layer.master')
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="header">
			<caption>
				<h3>Lịch hẹn chưa duyệt</h3>
			</caption>
		</div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<thead>
					<th>STT</th>
					<th>Khách hàng</th>
					<th>Bác sĩ</th>
					<th>Ngày</th>
					<th>Ca</th>
					<th>Thời gian</th>
					<th>Trang thái</th>
				</thead>
				<tbody>
					@php
						$stt = 0;
					@endphp
					@foreach ($array as $lich_hen)
					<tr>
						<td>{{++$stt}}</td>
						<td>{{$lich_hen->ten_khach_hang}}</td>		
						<td>{{$lich_hen->ten_bac_si}}</td>		
						<td>{{$lich_hen->ngay}}</td>	
						@if ($lich_hen->ma_ca == 1) <td>Sáng</td>
						@else  <td>Chiều</td>
						@endif
						
						<td>{{$lich_hen->gio_bat_dau}}-{{$lich_hen->gio_ket_thuc}}</td>
						<td class="td-actions text">
							<a href="">
								<button type="button" rel="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Duyệt">
									 <i class="fa fa-check"></i>
								</button>
							</a>
							<a href="">
								<button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Hủy">
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