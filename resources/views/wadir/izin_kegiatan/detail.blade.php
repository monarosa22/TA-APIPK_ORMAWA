@php
use Carbon\Carbon;
@endphp
@extends('layouts.main')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 20px">
            <a href="{{url('/wadir/izin_kegiatan') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-sign-out">Kembali</i>
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Izin Kegiatan</h3>
                </div>
                <form action="{{ url('/wadir/izin_kegiatan/' .$detail["id"]) }}" method="POST">
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
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i target="_blank" class="fa fa-download"></i> Unduh File
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
                        <div class="form-group @error("status") {{'has-error'}}@enderror ">
                            <div class="row">
                                <label for="status" class="control-label col-md-3">Status</label>
                                <div class="col-md-7">
                                    <select name="status"class="form-control"  id="status">
                                        <option value="">- Pilih -</option>
                                        <option value="1">Disetujui</option>
                                        <option value="2">Tidak Disetujui</option>
                                    </select>
                                    @error("status")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="view_komentar" style="display: none">
                            <div class="row">
                                <label for="komentar" class="control-label col-md-3">Alasan
                                </label>
                                <div class="col-md-8">
                                    <textarea name="komentar" class="form-control"id="komentar" rows="5" placeholder="Masukka Komentar"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="reset" class="btn btn-danger brn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button> &nbsp;
                        <button type="submit" class="btn btn-primary brn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section("javascript")

    <script type="text/javascript">
        $(document).ready(function() {
        $("#status").change(function() {
            let status = $(this).val();

            if (status == 1) {
                $("#view_komentar").hide();
            } else if (status == 2) {
                $("#view_komentar").show();
            }
        });
    });
    </script>

@endsection
