@extends('layouts.panel')

@section('hstyles')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tampil Wadah Sampah <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ site_url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('wadah') }}">Wadah</a></li>
                        <li class="breadcrumb-item active">Tampil Wadah</li>
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
                                            <td>Jenis Wadah</td>
                                            <td>Besar</td>
                                        </tr>
                                        <tr>
                                            <td>Kapasitas</td>
                                            <td>5000 (Masih Aman)</td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td>Ruang 1</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>Siap</td>
                                        </tr>
                                        <tr>
                                            <td>Kode Seri</td>
                                            <td>CE4342DGER</td>
                                        </tr>
                                        <tr>
                                            <td>Informasi Tambahan</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
						<a class="btn btn-warning" href="{{ site_url('wadah/edit/1') }}"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-danger" href="{{ site_url('wadah/destroy/1') }}"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

@section('fscripts')

@endsection
