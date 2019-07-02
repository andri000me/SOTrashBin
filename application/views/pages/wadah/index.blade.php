@extends('layouts.panel',['activeMenu' => 'entities','activeSubMenu' => 'sampah.index'])

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
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                            <a href="{{ site_url('wadah/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Wadah Sampah Baru</a>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <label for="filter">
                                    <select id="table-data-filter-column" class="form-control form-control-sm">
                                        <option>Num</option>
                                        <option>Device Reference</option>
                                        <option>Admin</option>
                                        <option>Title</option>
                                        <option>Category</option>
                                        <option>status</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table id="table-data" class="table table-bordered table-striped table-responsive-sm text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Wadah</th>
                                    <th>Kapasitas</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Info</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Besar</td>
                                    <td>5000g</td>
                                    <td>Ruang 1</td>
                                    <td>Siap</td>
                                    <td>-</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-chevron-circle-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item nav-show" href="{{ site_url('wadah/show/1') }}"><i
                                                    class="fa fa-eye"></i> Show</a>
                                                <a class="dropdown-item nav-warning" href="{{ site_url('wadah/edit/1') }}"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                                <a class="dropdown-item nav-danger" href="{{ site_url('wadah/destroy/1') }}"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sedang</td>
                                    <td>3500g</td>
                                    <td>Ruang 2</td>
                                    <td>Ada Pemeliharaan</td>
                                    <td>Wadah yang kuat</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-chevron-circle-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-menu">
													<a class="dropdown-item nav-show" href="{{ site_url('wadah/show/1') }}"><i
														class="fa fa-eye"></i> Show</a>
													<a class="dropdown-item nav-warning" href="{{ site_url('wadah/edit/1') }}"><i
														class="fa fa-edit"></i> Edit</a>
													<a class="dropdown-item nav-danger" href="{{ site_url('wadah/destroy/1') }}"><i class="fa fa-trash"></i> Delete</a>
												</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
