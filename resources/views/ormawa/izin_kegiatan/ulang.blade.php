@extends('layouts.main')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 20px">
            <a href="{{url('/ormawa/izin_kegiatan/') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-sign-out"> Kembali</i>
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Unggah Ulang Izin Kegiatan</h3>
                </div>
                <form action="{{ url('/ormawa/izin_kegiatan/ajukan/'.$detail->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="file_lama" value="{{$detail->file_surat }}">
                    <div class="panel-body">
                        <div class="form-group @error("nama_kegiatan") {{'has-error'}}
                        @enderror">
                        <div class="row">
                            <label for="nama_kegiatan" class="control-label col-md-3">Nama Kegiatan</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" value="{{old('nama_kegiatan') ?? $detail->nama_kegiatan ?? ''}}">
                                @error("nama_kegiatan")
                                <span class="text-danger"> {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group @error("mulai") {{ 'has-error'}} @enderror">
                        <div class="row">
                            <label for="mulai" class="control-label col-md-3"> Mulai Pelaksanaan</label>
                            <div class="col-md-8">
                                <input type="datetime-local" class="form-control"name="mulai" id="mulai" value="{{ old('mulai') ?? $detail->mulai ?? '' }}">
                                @error("mulai")
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group @error("akhir") {{ 'has-error'}} @enderror">
                        <div class="row">
                            <label for="akhir" class="control-label col-md-3"> Selesai Pelaksanaan</label>
                            <div class="col-md-8">
                                <input type="datetime-local" class="form-control"name="akhir" id="akhir" value="{{ old('akhir') ?? $detail->akhir ?? '' }}">
                                @error("akhir")
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group @error("tempat_pelaksanaan") {{ 'has-error' }}@enderror">
                        <div class="row">
                            <label for="tempat_pelaksanaan" class="control-label col-md-3">Tempat Pelaksanaan</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Masukkan Tempat Pelaksanaan Kegiatan" value="{{ old('tempat') ?? $detail->tempat ?? '' }}">
                                @error("tempat")
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group @error("unggah_file") {{ 'has-error' }}@enderror">
                        <div class="row">
                            <label for="unggah_file" class="control-label col-md-3">Unggah File</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="unggah_file" id="unggah_file">
                                @error('unggah_file')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button> &nbsp;
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
