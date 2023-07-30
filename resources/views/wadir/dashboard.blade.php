@extends('layouts.main')

@section('content')

    <div class="main" style="padding-top: 120px;">
            <div class="main-content">
                <div class="container-fluid">

                    @if (session("message"))
                    <div class="alert alert-success">
                        <strong>{!! session("message") !!}</strong>. Selamat Datang di
                        <strong>Aplikasi Pengajuan Izin dan Pelaporan Kegiatan ORMAWA POLINDRA!</strong>
                        <hr>
                        Anda Login Sebagai
                        <strong>WADIR</strong>.
                        <br>
                        <p>*Silahkan Pilih Menu Untuk Memulai Program!</p>
                    </div>
                    @endif

                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dashboard Wadir</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon">
                                            <i class="fa fa-download"></i>
                                        </span>
                                        <p>
                                            <span class="number">200</span>
                                            <span class="title">Izin Kegiatan</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon">
                                            <i class="fa fa-shopping-bag"></i>
                                        </span>
                                        <p>
                                            <span class="number">23</span>
                                            <span class="title">Izin Kegiatan yang Ditolak</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                        <p>
                                            <span class="number">250</span>
                                            <span class="title">Izin Kegiatan yang Diterima</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="metric">
                                        <span class="icon">
                                            <i class="fa fa-bar-chart"></i>
                                        </span>
                                        <p>
                                            <span class="number">35%</span>
                                            <span class="title">Laporan Kegiatan</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
