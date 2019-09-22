@extends('layer_custom.master')
@section('content')
<div class="appointment-form-content">
	<div class="row no-gutters align-items-center">
		<div class="col-12 col-lg-12">
			<div class="medilife-appointment-form">
				<div class="row align-items-end">
					<table class="table table-hover table-dark">
						<thead>
							<tr>
								<th scope="col">Ngày</th>
								<th scope="col">Ca</th>
								<th scope="col">Tên bác sĩ</th>
								<th scope="col">Trạng thái</th>
								<th scope="col">Ghi chú</th>
								<th scope="col">Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($lich_hen as $lich)
								@if ($lich->trang_thai == 0)
									<tr class="bg-primary">
										<th>{{ $lich->ngay }}</th>
										<th>{{ $lich->ca->gio_bat_dau }}-{{ $lich->ca->gio_ket_thuc }}</th>
										<th>{{ $lich->bac_si->ten_bac_si }}</th>
										<th>Chưa duyệt</th>
										<th>{{ $lich->ghi_chu }}</th>
										<th><a href="{{ route('delete_lich_hen',['ma_khach_hang' => $lich->ma_khach_hang,
										'ngay' => $lich->ngay, 'ma_ca' => $lich->ma_ca,]) }}"><i class="btn btn-warning fa fa-trash"></i></a></th>
									</tr>
								@elseif ($lich->trang_thai == 1)
									<tr class="bg-success">
										<th>{{ $lich->ngay }}</th>
										<th>{{ $lich->ca->gio_bat_dau }}-{{ $lich->ca->gio_ket_thuc }}</th>
										<th>{{ $lich->bac_si->ten_bac_si }}</th>
										<th>Đã duyệt</th>
										<th>{{ $lich->ghi_chu }}</th>
										<th></th>
									</tr>
								@else
									<tr class="bg-danger">
										<th>{{ $lich->ngay }}</th>
										<th>{{ $lich->ca->gio_bat_dau }}-{{ $lich->ca->gio_ket_thuc }}</th>
										<th>{{ $lich->bac_si->ten_bac_si }}</th>
										<th>Đã hủy</th>
										<th>{{ $lich->ghi_chu }}</th>
										<th><a href="{{ route('delete_lich_hen',['ma_khach_hang' => $lich->ma_khach_hang,
										'ngay' => $lich->ngay, 'ma_ca' => $lich->ma_ca,]) }}"><i class="btn btn-warning fa fa-trash"></i></a></th>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection