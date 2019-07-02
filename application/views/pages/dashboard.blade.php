@extends('layouts.panel',['activeMenu' => 'dashboard'])

@section('hstyles')

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Dashboard</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<!-- Info boxes -->
	<div class="row">
		<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
				<span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

				<div class="info-box-content">
						<span class="info-box-text">Tempat Sampah</span>
						<span class="info-box-number">
						1 Aktif <-> 3 Total
						</span>
				</div>
				<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
				<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-signal"></i></span>

				<div class="info-box-content">
						<span class="info-box-text">Status</span>
						<span class="info-box-number">(Aman, Peringatan, 1 Penuh)</span>
				</div>
				<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<!-- fix for small devices only -->
		<div class="clearfix hidden-md-up"></div>

		<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
				<span class="info-box-icon bg-success elevation-1"><i class="fa fa-calendar-o"></i></span>

				<div class="info-box-content">
						<span class="info-box-text">Tanggal Sekarang</span>
						<span class="info-box-number">Selasa, 18 Juni 2019</span>
				</div>
				<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
				<span class="info-box-icon bg-warning elevation-1"><i class="fa fa-file"></i></span>

				<div class="info-box-content">
						<span class="info-box-text">Riwayat Aksi</span>
						<span class="info-box-number">5 Info</span>
				</div>
				<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
		</div>
		<!-- /.col -->
</div>
<!-- Section Data -->
<div class="row">
		<div class="col-12">
				<div class="card">
						<div class="card-body">
								<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
										<thead>
												<tr>
														<th>#</th>
														<th>Status Log</th>
														<th>Weight</th>
														<th>Waktu Log</th>
												</tr>
										</thead>
										<tbody>
												<tr>
														<td>1</td>
														<td>Membuang Sampah pada sampah #201</td>
														<td>0,98g</td>
														<td>1 menit yang lalu</td>
												</tr>
												<tr>
														<td>2</td>
														<td>Membuang Sampah pada sampah #345</td>
														<td>0,45g</td>
														<td>2 menit yang lalu</td>
												</tr>
												<tr>
														<td>3</td>
														<td>Membuang Sampah pada sampah #55</td>
														<td>1,65g</td>
														<td>3 menit yang lalu</td>
												</tr>
												<tr>
														<td>4</td>
														<td>Membuang Sampah pada sampah #22</td>
														<td>60,45g</td>
														<td>3 menit yang lalu</td>
												</tr>
												<tr>
														<td>5</td>
														<td>Membuang Sampah pada sampah #22</td>
														<td>700,45g</td>
														<td>5 menit yang lalu</td>
												</tr>
										</tbody>
								</table>
						</div>
				</div>
		</div>
</div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
<!-- DataTables -->
<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
	var table = $('#table-data').DataTable();

</script>
@endsection
