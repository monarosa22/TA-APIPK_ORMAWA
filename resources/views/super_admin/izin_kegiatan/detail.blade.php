@php
use Carbon\Carbon;
@endphp
@extends('layouts.main')

@section("title", "Detail Izin Kegiatan")

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 20px">
            <a href="{{url('/super_admin/izin_kegiatan') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-sign-out">Kembali</i>
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Izin Kegiatan</h3>
                </div>
                <form action="{{ url('/super_admin/izin_kegiatan/update/' .$detail["id"]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="nama_ormawa" class="control-label col-md-3">Nama ORMAWA</label>
                                <div class="col-md-7">
                                    {{ $detail["users"]["nama"]}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="nama_kegiatan" class="control-label col-md-3">Nama Kegiatan</label>
                                <div class="col-md-7">
                                    {{ $detail["nama_kegiatan"]}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="file_surat_izin" class="control-label col-md-3">
                                    File Surat Izin
                                </label>
                                <div class="col-md-7">
                                    <a target="_blank" href="{{ url('/super_admin/izin_kegiatan/download/'.$detail->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-download"></i> Unduh File
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="waktu_pelaksanaan" class="control-label col-md-3">
                                    Waktu Pelaksanaan
                                </label>
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
                                <label for="tempat" class="control-label col-md-3">Tempat Pelaksanaan</label>
                                <div class="col-md-7">
                                    {{ $detail["tempat"]}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="status" class="control-label col-md-3">Status</label>
                                <div class="col-md-7">
                                    @if ($detail["status"] == "1")
                                    <button class="btn btn-success btn-sm">
                                        Disetujui
                                    </button>
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="file_surat_balasan" class="control-label col-md-3">Surat Balasan</label>
                                <div class="col-md-7">
                                    @if (!empty($detail->file_surat_balasan))
                                    <a target="_blank" href="{{ url('/super_admin/izin_kegiatan/balasan/'.$detail->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-download"></i> Unduh File
                                    </a>
                                    @else
                                    <input type="file" class="form-control" name="file_surat_balasan" id="file_surat_balasan">
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if (!empty($detail->file_surat_balasan))

                        @else
                        <hr>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button> &nbsp;
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
