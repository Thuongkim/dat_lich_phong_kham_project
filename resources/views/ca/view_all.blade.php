@extends('layer.master')
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="header">
			<caption>
				<a href="{{ route('ca.view_insert') }}">
					<button class="btn btn-success">
						Thêm ca làm việc
					</button>
				</a>			
			</caption>
		</div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<thead>
					<th>Mã ca</th>
					<th>Thời gian làm việc</th>
					<th>Tác vụ</th>
				</thead>
				<tbody>
					@foreach ($array as $ca)
					<tr>
						<td>{{$ca->ma_ca}}</td>	
						<td>{{$ca->gio_bat_dau}}-{{$ca->gio_ket_thuc}}</td>		
						<td class="td-actions text">
							<a href="{{ route('ca.view_update', ['ma_ca' => $ca->ma_ca]) }}">
								<button type="button" rel="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Sửa">
									<i class="fa fa-edit"></i>
								</button>
							</a>
							<a href="{{ route('ca.delete', ['ma_ca' => $ca->ma_ca]) }}">
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
	