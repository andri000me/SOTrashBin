@extends('layouts.panel')

@section('hstyles')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tampil Info Aktif Wadah<small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ site_url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('info/wadah') }}">Info Aktif Wadah</a></li>
                        <li class="breadcrumb-item active">Tampil Info Aktif Wadah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Info</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Kode Seri</td>
                                            <td>{{ $info->kode_seri }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td>{{ $info->ukuran }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kapasitas</td>
                                            <td>{{ $info->kapasitas }}g</td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td>{{ $info->lokasi }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>{{ $info->status }}</td>
                                        </tr>
                                        <tr>
                                            <td>Informasi Tambahan</td>
                                            <td>{{ $info->info_tambahan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="row">
            <div class="col-md-12">
                @if(@$info2)
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Aktifitas Wadah</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="float-right">
									<label for="filter">
										<select id="table-data-filter-column" class="form-control form-control-sm">
											<option>Jarak</option>
											<option>Level</option>
											<option>Kelembapan</option>
											<option>Suhu</option>
											<option>Berat</option>
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
										<th>Jarak</th>
										<th>Level</th>
										<th>Kelembapan</th>
										<th>Suhu</th>
										<th>Berat</th>
									</tr>
								</thead>
								<tbody>
									@php
										$i = 1;
									@endphp
									@foreach($info2 as $info_data)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{ $info_data->jarak }}cm</td>
										<td>{{ $info_data->level }}%</td>
										<td>{{ $info_data->kelembapan }}%</td>
										<td>{{ $info_data->suhu }}°</td>
										<td>{{ $info_data->berat }}g</td>
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
    </div>
    </section>
@endsection

@section('fscripts')
<!-- DataTables -->
<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
    var table = $('#table-data').DataTable();

    $('.dataTables_filter input').unbind().bind('keyup', function() {
        var colIndex = document.querySelector('#table-data-filter-column').selectedIndex;
        table.column(colIndex).search(this.value).draw();
    });
</script>
@endsection
