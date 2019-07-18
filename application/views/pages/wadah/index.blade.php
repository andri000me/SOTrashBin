@extends('layouts.panel')

@section('hstyles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Wadah Sampah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ site_url('beranda') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Wadah Sampah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Wadah Sampah</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ site_url('wadah/create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Wadah Sampah</a>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <label for="filter">
                                    <select id="table-data-filter-column" class="form-control form-control-sm">
                                        <option>Kode Seri</option>
                                        <option>Ukuran</option>
                                        <option>Kapasitas</option>
                                        <option>Lokasi</option>
                                        <option>Status</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table id="table-data" class="table table-bordered table-striped table-responsive-sm text-center">
                            <thead>
                                <tr>
                                    <th>Kode Seri</th>
                                    <th>Ukuran</th>
                                    <th>Kapasitas</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($info as $info_data)
								<tr>
									<td>{{ $info_data->kode_seri }}</td>
									<td>{{ $info_data->ukuran }}</td>
									<td>{{ $info_data->kapasitas }}</td>
									<td>{{ $info_data->lokasi }}</td>
									<td>{{ $info_data->status }}</td>
									<td>
										<a href="{{ site_url('wadah/show/'.$info_data->kode_seri) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Tampil</a> | 
										<a href="{{ site_url('wadah/edit/'.$info_data->kode_seri) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah</a> | 
										<a href="{{ site_url('wadah/destroy/'.$info_data->kode_seri) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
								</tr>
								@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('fscripts')
<!-- DataTables -->
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
    var table = $('#table-data').DataTable();

    $('.dataTables_filter input').unbind().bind('keyup', function() {
        var colIndex = document.querySelector('#table-data-filter-column').selectedIndex;
        table.column(colIndex).search(this.value).draw();
    });
</script>
@endsection
