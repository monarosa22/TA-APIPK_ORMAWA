@extends('layouts.main')

@section("title", "Profil Saya")

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 30px">

            @if (session("success"))
            <div class="alert alert-success">
                <strong>Berhasil!</strong>
                {!! session("success") !!}
            </div>
            @endif
            
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Profil Saya</h3>
                </div>
                <form action="{{ url('/wadir/profil_saya/update/'.Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="panel-body">
                        <div  class="row">
                            <div class="col-md-4">
                                <center>
                                    @if (empty(Auth::user()->foto))
                                    <img src="{{ url('/image/user-profil.png') }}" style="width:100px; height:100px;"></center> &nbsp;
                                    @else
                                    <input type="hidden" name="gambarOld"  value="{{ Auth::user()->foto }}">
                                    <img src="{{ url('storage/' . Auth::user()->foto) }}" style="width:100px; height:100px;"></center> &nbsp;
                                    @endif
                                <input type="file" class="form-control"  name="foto" id="foto">
                            </div>
                            <br>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="nama" class="control-label col-md-3 ">Nama</label>
                                        <div class="col-md-7">
                                            <input type="text"  class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ Auth::user()->nama }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="email" class="control-label col-md-3 ">Email</label>
                                        <div class="col-md-7">
                                            <input type="text"  class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"> Batal
                        </i>
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
