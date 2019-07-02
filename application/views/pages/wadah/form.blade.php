@extends('layouts.panel',['activeMenu' => 'forms','activeSubMenu' => 'wadah.create'])

@section('hstyles')
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Edit' : 'Create' }} Wadah Sampah <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ site_url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Edit' : 'Create' }} Wadah Sampah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('wadah/update'.@$info->id) : site_url('wadah/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">Jenis Wadah</label>
                                        <select class="form-control" name="jenis_wadah" id="">
                                            <option value="besar">Besar</option>
                                            <option value="sedang">Sedang</option>
                                            <option value="kecil">Kecil</option>
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label for="lokasi">Kapasitas</label>
                                        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi Wadah" value="{{ @$info->lokasi }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi">Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi Wadah" value="{{ @$info->lokasi }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Status</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="siap">Siap</option>
                                            <option value="pemeliharaan">Pemeliharaan</option>
                                            <option value="belum">Belum</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Kode">Kode Seri *</label>
                                        <input type="text" class="form-control" name="kode_seri" placeholder="Kode Seri" value="{{ @$info ? @$info->serial_number : generate_sn() }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-{{ @$info ? 'warning' : 'primary' }}">Submit</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format : 'YYYY-MM-DD hh:mm:ss',
                ignoreReadonly: true
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('admin/vendor/bootstrap-datetimepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
@endsection
