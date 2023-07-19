@extends('layouts.main')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 10px">
            {{-- <button href="{{url('/super_admin/pengguna/create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus">Tambah</i>
            </button> --}}
            <a href="{{url('/ormawa/izin_kegiatan/create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus">Tambah Izin Kegiatan</i>
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Izin Kegiatan</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">File Surat</th>
                                <th class="text-center">File Surat Balasan</th>
                                <th class="text-center">Tempat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($izin_kegiatan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item["nama_kegiatan"] }}</td>
                                <td class="text-center">
                                    <i class="fa fa-download"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fa fa-download"></i>
                                </td>
                                <td class="text-center">{{ $item["tempat"] }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/ormawa/izin_kegiatan/show/' .$item["id"]) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-search"></i> Detail
                                    </a>
                                    {{-- <a href="{{ url('/ormawa/izin_kegiatan/edit/' .$item["id"]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit">Edit</i>
                                    </a> --}}
                                    <form action="{{ url('/ormawa/izin_kegiatan/destroy/' . $item["id"]) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method("Delete")
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash">Hapus</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection