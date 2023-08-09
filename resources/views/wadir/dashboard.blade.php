@extends('layouts.main')

@section("title", "Dashboard")

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
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-book"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $izin_kegiatan }}</span>
                                    <span class="title">Izin Kegiatan</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-times"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $kegiatan_ditolak }}</span>
                                    <span class="title">Kegiatan Ditolak</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-check"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $kegiatan_disetujui }}</span>
                                    <span class="title">Kegiatan Disetujui</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-bar-chart"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $laporan_kegiatan }}</span>
                                    <span class="title">Laporan Kegiatan</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($kegiatan) > 0)
            <div class="panel panel-headline">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection

@section('javascript')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    const ctx = document.getElementById("myChart");

    const dataperbulan = Array.from({length: 12}, () => 0)

    @foreach ($kegiatan as $izin)
    @php
    $bulanIndex = date('n', strtotime($izin->created_at));
    $tahun = date('Y', strtotime($izin->created_at));
    @endphp

    @if ($tahun == date("Y"))
    dataperbulan[{{$bulanIndex - 1}}]++;
    @endif
    @endforeach

    function getlabelbulan(bulan) {
            const namabulan = new Date(0, bulan - 1).toLocaleString("default", { month: 'long' });
            return namabulan.substring(0,9);
        }

        const labelsbulan = [];
        for (let i = 1; i <= 12; i++) {
                labelsbulan.push(getlabelbulan(i));
            }

            new Chart(ctx, {
                    type: 'bar',
                    data: {
                            labels: labelsbulan,
                            datasets: [{
                                    label: 'Monitoring Keseluruhan Pertahun Ini',
                                    data: dataperbulan,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                    scales: {
                                            y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });                    </script>

                                @endsection
