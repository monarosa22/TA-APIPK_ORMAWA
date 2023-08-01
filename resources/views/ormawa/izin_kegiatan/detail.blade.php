@php
use Carbon\Carbon;
@endphp
@extends('layouts.main')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 20px">
            <a href="{{url('/ormawa/izin_kegiatan/') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-sign-out"> Kembali </i>
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Data Izin Kegiatan</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="nama_kegiatan" class="control-label col-md-3">Nama Kegiatan</label>
                            <div class="col-md-8">
                                {{ $detail["nama_kegiatan"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="waktu_pelaksanaan" class="control-label col-md-3">Waktu Pelaksanaan</label>
                            <div class="col-md-7">
                                @php
                                $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $detail->mulai);
                                $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                                s/d
                                @php
                                $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $detail->akhir);
                                $format = $akhir->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="tempat_pelaksanaan" class="control-label col-md-3">Tempat Pelaksanaan</label>
                            <div class="col-md-8">
                                {{ $detail["tempat"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="unggah_file" class="control-label col-md-3"> File Izin Kegiatan</label>
                            <div class="col-md-8">
                                <a href="" class="btn btn-primary btn-sm">
                                    <i class="fa fa-download"></i> Unduh File
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($detail->status == 0)
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-warning btn-sm" >Belum Dikonfirmasi</button>
                            </div>
                        </div>
                    </div>
                    @elseif ($detail->status == 1)
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success btn-sm" >Disetujui</button>
                            </div>
                        </div>
                    </div>
                    @elseif ($detail->status == 2)
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-danger btn-sm" >Tidak Disetujui</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-3">Komentar</label>
                            <div class="col-md-8">
                                <strong>
                                    <span class="text-danger">
                                        {{ $detail->komentar }}
                                    </span>
                                </strong>
                            </div>
                        </div>
                    </div>
                    @elseif($detail->status == 3)
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-info btn-sm" >Pengajuan Ulang</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-3">Komentar Sebelumnya</label>
                            <div class="col-md-8">
                                <strong>
                                    <span class="text-danger">
                                        {{ $detail->komentar }}
                                    </span>
                                </strong>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
