@extends('layouts.panel')

@section('hstyles')

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Beranda</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Beranda</li>
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
			@if(@$info)
			<div class="card">
				<!-- /.card-header -->
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="row float-right">
								<label for="filter">
									<select id="table-data-filter-column" class="form-control form-control-sm">
										<option>Kode Seri</option>
										<option>Jarak</option>
										<option>Level</option>
										<option>Kelembapan</option>
										<option>Suhu</option>
										<option>Berat</option>
										<option>Waktu Daftar</option>
									</select>
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
							<thead>
								<tr>
									<th>#</th>
									<th>Kode Seri</th>
									<th>Jarak</th>
									<th>Level</th>
									<th>Kelembapan</th>
									<th>Suhu</th>
									<th>Berat</th>
								</tr>
							</thead>
							<tbody>
								@foreach($info as $info_data)
								<tr>
									<td>{{ $info_data->id }}</td>
									<td>{{ $info_data->kode_seri }}</td>
									<td>{{ $info_data->jarak }}</td>
									<td>{{ $info_data->level }}</td>
									<td>{{ $info_data->kelembapan }}</td>
									<td>{{ $info_data->suhu }}</td>
									<td>{{ $info_data->berat }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			@else
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-12 text-center">
							<span>Tidak ada data aktifitas yang masuk</span>
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
<!-- DataTables -->
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
$(document).ready(function() {
    var groupColumn = 1;
    var table = $('#table-data').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );

                    last = group;
                }
            } );
        }
    } );

    // Order by the grouping
    $('#table-data tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
} );
</script>
@endsection
