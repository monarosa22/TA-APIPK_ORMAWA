@extends('layouts.main')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 10px">
            {{-- <button href="{{url('/super_admin/pengguna/create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus">Tambah</i>
            </button> --}}
            <a href="{{url('/ormawa/izin_kegiatan/') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-sign-out">  Kembali</i>
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Izin Kegiatan</h3>
                </div>
                <form action="{{ url('/ormawa/izin_kegiatan/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="nama_kegiatan" class="control-label col-md-3">Nama Kegiatan</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="waktu_pelaksanaan" class="control-label col-md-3"> Waktu Pelaksanaan</label>
                                <label for="mulai" class="col-md-1">Mulai Dari</label>
                                <div class="col-md-3">
                                    <input type="datetime-local" class="form-control"name="mulai" id="mulai">
                                </div>
                                <label for="akhir" class="col-md-1">Sampai Dengan</label>
                                <div class="col-md-3">
                                    <input type="datetime-local" class="form-control" name="akhir" id="akhir">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="tempat_pelaksanaan" class="control-label col-md-3">Tempat Pelaksanaan</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="tempat_pelaksanaan" id="temppat_pelaksanaan" placeholder="Masukkan Tempat Pelaksanaan Kegiatan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="unggah_file" class="control-label col-md-3">Unggah File</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" name="unggah_file" id="unggah_file">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
