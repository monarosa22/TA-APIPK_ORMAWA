@extends('layouts.main')

@section("title", "Laporan Kegiatan")

@section("css")

<link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">

@endsection

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 30px">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Laporan Kegiatan</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama ORMAWA</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">File Laporan</th>
                                <th class="text-center">File Gambar</th>
                                {{-- <th class="text-center">Tempat</th> --}}
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["users"]["nama"]}}</td>
                                <td>{{ $item["nama_kegiatan"] }}</td>
                                {{-- <td class="text-center">{{ $item["tempat"] }}</td> --}}
                                <td class="text-center">
                                    @if (empty($item["laporan_kegiatan"]["file_lpj"]))
                                    <strong>
                                        <i>Belum Ada File Laporan</i>
                                    </strong>
                                    @else
                                    <a target="_blank" href="{{ url('/super_admin/laporan_kegiatan/lpj/' .$item["laporan_kegiatan"]["id"]) }}">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (empty($item["laporan_kegiatan"]["foto_dokumentasi"]))
                                        <strong>
                                            <i>
                                                Belum Ada Foto Dokumentasi
                                            </i>
                                        </strong>
                                    @else
                                    <img src="{{ url('storage/' . $item["laporan_kegiatan"]["foto_dokumentasi"]) }}" style="width:50px; height:50px">
                                    @endif
                                </td>
                                <td>-</td>
                                <td class="text-center">
                                    <a href="{{ url('/super_admin/laporan_kegiatan/show/' .$item["id"]) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-search"></i> Detail
                                    </a>
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

@section("javascript")

<script src="{{ url('/javascript/dataTables.min.js') }}"></script>
<script src="{{ url('/javascript/bootstrap.min.js') }}"></script>
<script>
    $('#example').DataTable();
</script>

@endsection
